<?
$currentTheme = $this->db->select("theme")
                            ->from("admin")
                            ->get()
                            ->result();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>admin_assets/bootstrap/css/bootstrap-cosmo.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>admin_assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins.. -->
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>admin_assets/images/admin.ico">
    <link href="<?=base_url()?>admin_assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>admin_assets/js/jQuery-2.1.4.min.js"></script>
<script src="<?=base_url()?>admin_assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_assets/plugins/ckeditor/ckeditor.js"></script>


<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"/>
<script type="text/javascript" src="<?=base_url()?>admin_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<style> .colorpicker-2x .colorpicker-saturation { width: 200px; height: 200px; } .colorpicker-2x .colorpicker-hue, .colorpicker-2x .colorpicker-alpha { width: 30px; height: 200px; } .colorpicker-2x .colorpicker-color, .colorpicker-2x .colorpicker-color div { height: 30px; } </style> <script> $(function() { $('#editcp9 , #cp9').colorpicker({ customClass: 'colorpicker-2x', sliders: { saturation: { maxLeft: 200, maxTop: 200 }, hue: { maxTop: 200 }, alpha: { maxTop: 200 } } }); }); </script>


    <style>
    .btn-mybtn{
      background-color: darkorchid;
      color: white;

    }
    .btn-mybtn:hover{
      background-color: purple;
    }
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <script type="text/javascript">
        var baseURL = "<?=base_url()?>"+"admin/";
    </script>
    <?$base_url=base_url().'admin/'?>
     
  </head>
  <body class="skin-<?=$currentTheme[0]->theme?> sidebar-mini">
      
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?=$base_url?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><big><b>A</b></big></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin Panel</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="" style="font-size: 20px;padding: 0;margin: 0;">
                <a href="<?=base_url()?>" title="Go back to main website"><i class="fa fa-home"></i></a>
            </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url()?>admin_assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$username?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url()?>admin_assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                       <?=$username?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?=$base_url?>logout" class="btn btn-default btn-flat btn-sm"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                  
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?=$base_url?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?=base_url()?>admin/edit/<?=$this->session->userdata ( 'username' )?>" >
                <i class="fa fa-pencil-square-o"></i>
                <span>Edit User</span>
              </a>
            </li>
             <li class="treeview">
              <a href="<?=base_url()?>admin/section/add">
                <i class="fa fa-plus-square"></i>
                <span>Add New Section</span>
              </a>
            </li>
             <li class="treeview">
              <a href="<?=base_url()?>admin/section/remove">
                <i class="fa fa-trash-o"></i>
                <span>Remove Section</span>
              </a>
            </li>
            <?
            $faicons= array('road','rss','eraser','empire','envira','forumbee','film','id-badge','cutlery','snowflake-o','plug','pie-chart','train','telegram');
              echo "<li class='header'>Sections &nbsp;";
              echo "<i class='fa fa-chevron-down'></i></li>";
              foreach ($sections as $section) { $index = rand(0,13);?>
                <li class="treeview">
              <a href="<?=base_url()?>admin/section/<?=$section->section?>">
                <i class="fa fa-<?=$faicons[$index]?>"></i>
                <span><?=ucfirst($section->section)?></span>
              </a>
            </li>
            <?  } ?>
          </ul>
        </section>
      </aside>
