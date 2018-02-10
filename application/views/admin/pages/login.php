<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3" style="background-color: rgba(255,255,255,0.9);padding: 8px;margin-top: 15%;">
      <h2>Login</h2>
        <form method="post" id="login-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="uname" id="uname" />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd" />
          </div>
          <div class="row">
            <div class="col-xs-4">
            <input type="submit" class="btn btn-info btn-block btn-flat" value="Login" id="btn-login"/>
          </div>
          </div>
        </form>
    </div>
    <div class="col-sm-3" style="margin-top: 15%;">
          <div id="logerr"></div></div>
<?
    if($registered == 0 ){?>
 <div class="col-sm-6" style="background-color: rgba(255,255,255,1);padding: 8px;margin-top: 15%;"> 
    <h2>Register Now</h2>
      <form id="reg-form" method="post">
        <div class="row">
            <div class="col-md-6">                                
                <div class="form-group">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Your Full Name">
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" id="email"  name="email" placeholder="Your Email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="password" class="form-control" id="password"  name="password" placeholder="Your Password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Your Password Again">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" maxlength="50" placeholder="Your Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="securityQA" name="securityQA" placeholder="What is your favourite color?">
                </div>
            </div>    
        </div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-warning" value="Reset" />
            </div>
        </form>
    </div>
  <? 
  }
?>
   
  </div>
</div>


<a style="bottom: 0;position:absolute;font-size: 30px;color: red;" href="<?=base_url()?>" title="Go back to main website"><i class="fa fa-home"></i></a>