
@extends('frontEnd.layouts.master')
@section('content')

  <div class="row">
  <div class="col-sm-2" style="min-height: 50px;"></div>

 <div class="col-sm-12">
    @foreach($movies as $movie)
    
        <div class="col-sm-4" >
            <div class="card mb-3" style="max-width: 540px;background-color: #fff;box-shadow: 5px 5px #c3c3c31f;">
            <div class="row no-gutters">
                <div class="col-md-4">
                     <img src="{{url('poster/',$movie->image)}}"   style="width: 124%;height: 230px;" alt="...">
                 </div>
            <div class="col-md-8">
            <div class="card-body">
                <div class="col-md-12"><h5 class="card-title" style="text-align: center;font-weight: bold;">{{ str_limit($movie->name, 30) }}</h5></div>
                <div class="col-md-12"><h5 class="card-date" style="text-align: center;font-size: 12px;color: #a6a6a6;">{{$movie->created_at->format('m/d/Y')}}</h5></div>
                <div class="col-md-12"><p class="card-text" style="color: #a6a6a6;min-height: 80px;">{{ str_limit($movie->details, 100) }} </p></div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12"> 
                    <button id="IDS" name="IDS" value="{{$movie->id}}" style="background-color: #ffffff;border: none;color: black;text-align: center;text-decoration: none;display: inline-block;">More Info</button>

                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-12" style="min-height: 50px;"></div>
</div>
</div>
     @endforeach

    

    </div>
  </div>

</div>
<script>
    
    $("button").click(function() {
    var ID = $(this).val();
    var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
             vars[key] = value;

            window.location.replace("http://127.0.0.1:8000/api/get/"+ID+"?"+key+"="+value);

    });
});


</script>

@endsection


