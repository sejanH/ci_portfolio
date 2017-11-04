<?php

$id = '';
$name = '';
$email = '';
$password = '';
$sQA = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $email = $uf->email;
        $username = $uf->username;
        $password = $uf->password;
        $sQA = $uf->securityQA;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Edit User</small>
      </h1>
    </section>
    
    <section class="content">

    <?
    if($title=='Edit User'){ ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-7">
              <!-- general form elements -->
                

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?=base_url().'admin/editUser/'.$id?>" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?=$name?>">
                                        <input type="hidden" value="<?=$id?>" name="userId" id="userId" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?=$email?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?=$username?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sQA">Your favourite color?</label>
                                        <input type="text" class="form-control" id="sQA" placeholder="Security Question Answer" name="sQA" value="<?=$sQA?>">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
            <div class="alert alert-danger">
                <ul>
                    <li>Leave both passwords field blank if you don't want to change you old password</li>
                    <li>After changing <strong>username</strong> you will be logged out. Login again with new username</li>
                </ul>
            </div>
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?=$this->session->flashdata('error')?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?=$this->session->flashdata('success')?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?=validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>')?>
                    </div>
                </div>
            </div>
        </div>
        <? }else{
            echo "<div class='well'>";
            echo "<div class='col-md-3 alert alert-danger'>Please focus on your on bussiness</div>";
            echo "<img src='".base_url()."admin_assets/images/access.png' width='50%' height='auto !important'/>";
            echo "</div>";
        } ?>
    </section>
</div>  