@extends('frontEnd.layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-12" style="min-height: 50px;"></div>

 <div class="col-sm-12">
    
            <div class="card mb-3" style="max-width: 800px;background-color: #fff;box-shadow: 5px 5px #c3c3c31f;">
            <div class="row no-gutters">
                <div class="col-md-4">
                     <img src="{{url('poster/',$movies->image)}}"   style="width: 70%;height: 230px;" alt="...">
                 </div>
            <div class="col-md-8">
            <div class="card-body">
                <div class="col-md-12"><h5 class="card-title" style="text-align: center;font-weight: bold;">{{$movies->name}}</h5></div>
                <div class="col-md-12"><h5 class="card-date" style="text-align: center;font-size: 12px;color: #a6a6a6;">{{$movies->created_at->format('m/d/Y')}}</h5></div>
                <div class="col-md-12"><p class="card-text" style="color: #a6a6a6;min-height: 80px;">{{$movies->details}} </p></div>

                <div class="col-md-12"></div>
                <div class="col-md-12"><p class="card-text" style="color: #a6a6a6;min-height: 10px;">Length Display : {{$movies->lengthdisplay}} min</p></div>
                <?php
                    $categorie=DB::table('mc-catrgory')->where('id',$movies->id)->value('name');
                 ?> 
                <div class="col-md-12"><p class="card-text" style="color: #a6a6a6">Categorie : {{$categorie}} </p></div>
            </div>
            </div>
        </div>
</div>

    

    </div>
  </div>

</div>

@endsection