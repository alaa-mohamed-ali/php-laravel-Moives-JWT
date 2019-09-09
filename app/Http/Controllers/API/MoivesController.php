<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Category;
use App\Movies;
use Validator;
use Image;

class MoivesController extends BaseController
{   
   /* public function __construct()
    {
        $this->middleware('auth:api');
    }*/

    //getall
    public function index(){
        $movies = Movies::all();
        //return $this->sendResponse($movies->toArray(), 'movies read succesfully');

        return view('movies',compact('movies'));

    }

    //add
    public function store(Request $request){
        $formInput=$request->all();
        $validator = Validator::make($formInput,[
            'name' => 'required',
            'lengthdisplay' => 'required',
            'details'=> 'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
            'categories_id'=> 'required|numeric',
           ]);

           if($validator -> fails()){
                return $this->sendError('error validation', $validator->errors());
            }
           
           if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['name'],"-").'.'.$image->getClientOriginalExtension();
                $image_path=public_path('poster/'.$fileName);

                Image::make($image)->resize(300,300)->save($image_path);
                $formInput['image']=$fileName;
            }
        }

       $movies =  Movies::create($formInput);
       return $this->sendResponse($movies->toArray(), 'Movie  Created Succesfully');

    }

    //get/{id}
    public function show($id){
        $movies = Movies::find($id);
        if (   is_null($movies)   ) {
            return $this->sendError(  'movie not found ! ');
        }
        //return $this->sendResponse($movies->toArray(), 'movie read succesfully');

        return view('details',compact('movies'));

    }

    //edit/{id}
    public function updates(Request $request , $id){
        $movie = Movies::find($id);
        $formInput = $request->all();
        $validator =    Validator::make($formInput, [
            'name' => 'required',
            'lengthdisplay' => 'required',
            'details'=> 'required',
            'categories_id'=> 'required|numeric',
        ] );

        if ($validator -> fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

       $movie->update($formInput);
        return $this->sendResponse($movie->toArray(), 'movie  updated succesfully');
    }

    //delete/{id}
    public function destroy($id){
         $movie = Movies::find($id);
         $movie->delete();

         $image_poster=public_path().'/poster/'.$movie->image;
         unlink($image_poster);

         return $this->sendResponse($movie->toArray(), 'movie  deleted succesfully');
    }

    //filter/{name}
    public function filter($name){
        $Namemovie = Movies::where('name', 'like', '%' . $name . '%')->get();

        //return $this->sendResponse($Namemovie->toArray(), 'The result');
        return view('filter',compact('Namemovie'));
        
    }

}
