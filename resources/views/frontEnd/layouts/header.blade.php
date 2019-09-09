<div class="container-fluid">
  <div class="row">
    <div class="col-sm-5" style="background-color:#081c23;text-align: center;color: #04d076;font-size: 25px;min-height: 50px;">FavMoive</div>
	<div class="col-sm-2" style="background-color:#081c23;min-height: 50px;"></div>

	<div class="col-sm-3" style="background-color:#081c23;text-align: center;color: #57923b;font-size: 30px;min-height: 50px;padding: 8px 0px;">
				<div class="input-group">
					<div class="input-group-btn">
						<input  type="image" src="{{url('Frontend/images/search.png')}}" onclick="myFunction()" style="background-color: #fff;height: 34px;width: 35px;">
					</div>
					<input type="text" id="name" class="form-control" placeholder="Search for a moive,tv show person... " name="search" style="font-style: italic;">
				</div>
	</div>


	<div class="col-sm-2" style="background-color:#081c23;;min-height: 50px;"></div>

</div>
<script>

function myFunction() {
 
	var name = document.getElementById("name").value;
if(name != ""){
    var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
             vars[key] = value;

            window.location.replace("http://127.0.0.1:8000/api/filter/"+name+"?"+key+"="+value);

	});
}	
}

    
</script>