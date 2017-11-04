<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap  -->
    <link href="<?=base_url()?>admin_assets/bootstrap/css/bootstrap-paper.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?=base_url()?>admin_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>admin_assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/x-icon" href="<?=base_url()?>admin_assets/images/admin.ico">
    <script src="<?=base_url()?>admin_assets/js/jQuery-2.1.4.min.js"></script>
    <style type="text/css">
    body{
      background: url('<?=base_url()?>admin_assets/images/bg.jpg') no-repeat center fixed;
      background-size:  cover ;
    }
    .form-control{
      display: block;
      width: 100%;
      height: 48px;
      padding: 6px 16px;
      font-size: 16px;
      line-height: 1.846;
      color: hotpink;
      background-color: transparent;
      background-image: none;
      border: none;
      border-radius: 3px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.675);
      box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
      -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
      -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
      transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    .form-control:focus{
      color: orange;
      border-bottom: 1px solid orange;
    }
    div>label{
      color: red;
    }
    </style>
  </head>
  <body>
  