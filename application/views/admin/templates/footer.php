
<?if($title!='Admin Login'){ ?> 
<div class="main-footer" >
<strong>Copyright &copy; <?=date('Y')?> All rights reserved.</strong>
    </div>
    </div>
<? } ?>

    <script src="<?=base_url()?>admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/validate.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>