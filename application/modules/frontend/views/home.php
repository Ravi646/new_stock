<!------ Include the above in your HEAD tag ---------->
<html>
  <head>
  <link href="<?php echo base_url('assets/common/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
  <link href="<?php echo base_url('assets/common/css/font-awesome.min.css') ?>" rel="stylesheet" id="bootstrap-css">
  <link href="<?php echo  base_url('assets/common/css/style.css') ?>" rel="stylesheet" id="bootstrap-css">
  <!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Please enter your email and password</p>
   </div>
   <?php 
    $attribute = array('id' => 'Login');
    echo form_open('user-login',$attribute) ;?>
      <div class="form-group">
      <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Enter UserName">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password">
</div>
        <div class="forgot">
        <!-- <a href="reset.html">Forgot password?</a> -->
</div>
        <button type="submit" class="btn btn-primary">Login</button>

   <?php echo form_close(); ?>
    </div>
<p class="botto-text"> Designed by Ravi Dubey</p>
</div></div></div>
<script src="<?php echo base_url('assets/common/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/common/js/bootstrap.min.js')?>"></script>
</body>
</html>
