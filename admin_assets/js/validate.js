$(document).ready(function(){
    jQuery.validator.addMethod("validate_email",function(value, element) {
   if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ))
    {
       return true;
    }
    else
    {
      return false;
    }    
  },"Please enter a valid Email.");
	
  $("#btn-login").click(function(){
    $("#login-form").validate({
        rules:
        {
            uname: {
                required: true,
                minlength: 4
            },
            pwd: {
                required: true,
                minlength: 6
            }
        },
        messages:
        {
            uname: "Enter a Valid Username",
            pwd:{
                required: "Provide a Password",
                minlength: "Password Needs To Be Minimum of 6 Characters"
            }
        },
        submitHandler: loginNow
      });

      function loginNow(){
      var data = $("#login-form").serialize();
      $.ajax({
        type: "POST",
        url: "login/loginMe",
        data: data,
        success: function(data){
          if(data=="OK"){
           window.location.href=".";
          }
          else if(data=="failed"){
            $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"><span> Username & Password Missmatch').fadeOut(3000);
          }
          else{
            $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"><span> '+data).fadeOut(7000);
          }
        },
        error: function(){
          $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps something happened').fadeOut(3000);
        }
      });
    }
  });
      
//validate registration form
  $("#reg-form").validate({
    rules:{
      fname :{ required : true },
      email : { required : true, email : true },
      password : { required : true },
      cpassword : {required : true, equalTo: "#password"},
      username : { required : true},
      securityQA : {required : true}
    },
    messages:{
      fname :{ required : "This field is required" },
      email : { required : "This field is required", email : "Please enter valid email address" },
      password : { required : "This field is required" },
      cpassword : {required : "This field is required", equalTo: "Please enter same password" },
      username : { required : "This field is required"},
      securityQA : { required : "This field is required"}
    },
        submitHandler: registerNow
  });
        function registerNow(){
      var data = $("#reg-form").serialize();
      $.ajax({
        type: "POST",
        url: "register",
        data: data,
        success: function(data){
          if(data==1){
            $("#logerr").addClass("alert alert-success").fadeIn().html('<span class="glyphicon glyphicon-ok"></span> Registration Complete').fadeOut(3000);
          }
          else{
            $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> '+data).fadeOut(7000);
          }
        },
        error: function(){
          $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps something happened').fadeOut(3000);
        }
      });
    }

});
