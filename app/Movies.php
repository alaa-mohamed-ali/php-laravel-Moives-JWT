<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table='mc-movies';
    protected $primaryKey='id';
    protected $fillable=['name','lengthdisplay','details','image','categories_id','remember_token','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }
}
