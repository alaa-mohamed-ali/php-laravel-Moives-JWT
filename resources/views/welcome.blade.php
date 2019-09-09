<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Moives</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>
    <body>
      <div class="container">
        <div class="col-sm-5">
         <div class="alert alert-success" style="display:none"></div>		
            <div class="form-group">
              <label for="type">email:</label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
               <label for="price">password:</label>
               <input type="text" class="form-control" name="password" id="password">
             </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
      </div></div>
     <span id="success_message"></span>
     
      <script>
      $(document).ready(function() {
        $('#ajaxSubmit').on('click', function() {
                //alert("_token");
                //var _token = $("input[name='_token']").val();
               // var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                $.ajax({
                    url: "http://127.0.0.1:8000/api/user/login",
                    type: "GET",
                    data:{
                      //  name:name,
                     // _token:_token,
                        email:email,
                        password:password
                    },
                    success:function(data){
                        $("#email_error").html('');
                        $("#password_error").html('');
                        $.each(data, function(key, value){
                            //$("#success_message").html(value);
                            if(key == "email" || key == "password"){
                                alert("Enter your fields");
                                window.location.href = "http://127.0.0.1:8000/";
                            }else{
                                window.location.href = "http://127.0.0.1:8000/api/getall?"+key+"="+value;
                        }
                        });
                       
                    },
                    error: function(data) {
                        alert("some error");
                    }

                });
            
            });
        });

        
      </script>
    </body>
</html>