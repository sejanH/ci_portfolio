<div class="content-wrapper">
	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>  <?=ucfirst($title)?>
        <small>Manage Section</small>
        <span style="font-size: 12px;float: right;" class="btn btn-default" title="<b>Keep that in mind</b>" data-html="true" data-placement="left" data-toggle="popover" data-trigger="hover" data-content="<ul><li>You should be familiar with HTML, CSS, Bootstrap</li><li>Do not set opacity of section color it may reveal next section content</li><li>After removing one section refresh the page for next removal</li></ul>">you should know</span>
      </h1>
    </section>

<section class="content">
    <?

        if($title!='Sections &raquo; Add new'){
          echo "<form id='section-form' method='post'>";
          echo "<div class='form-inline'>";
          echo "<input class='form-control' id='editSection' name='editSection' value='".$content[0]->section."'>";
          echo "<input id='editcp9' type='text' name='editcp9' class='form-control' value='".$content[0]->color."'/>";
          echo "</div>";
          echo "<textarea id='editsectionbody' name='editsectionbody' class='form-control'>".$content[0]->body."</textarea>";
          echo "<button class='btn btn-mybtn' id='btnSubmit'>Submit</button>";
          echo "<span id='logerr'></span>";
          echo "</form>";
        }else{
          echo "<form id='sectionadd-form' method='post'>";
          echo "<div class='form-inline'>";
          echo "<input class='form-control' id='addSection' name='addSection' placeholder='Section Name'>";
          echo "<input id='cp9' type='text' name='cp9' class='form-control' placeholder='Pick a background color'/>";
          echo "</div>";
          echo "<textarea id='sectionaddBody' name='sectionaddBody' class='form-control'></textarea>";
          echo "<button class='btn btn-mybtn' id='btnAdd'>Submit</button>";
          echo "<span id='logerr'></span>";
          echo "</form>";
        }
      
    ?>
</section>
</div> 
<?
if($title!='Sections &raquo; Add new'){?>
<script type="text/javascript">
    var ck = CKEDITOR.replace( 'editsectionbody' );
    $('#section-form').validate({
    rules:
    {
      editSection: {required:true}
    },
    message:
    {
      editSection: { required : "This field is required" },
    },
        submitHandler: editNow
  });
    function editNow(){
    CKEDITOR.instances.editsectionbody.updateElement();
        var data = $('#section-form').serialize();//+CKEDITOR.instances.sectionbody.getData();
    // console.log(data);
    $.ajax({
      type: "POST",
      url: "edit/<?=$content[0]->section?>",
      data: data,
      success: function(data){
      if(data==1){
        $("#logerr").addClass("alert alert-success").fadeIn().html('<span class="glyphicon glyphicon-ok"></span>Edit Successful').fadeOut(3000);
      }
      else{
        $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> No changes made').fadeOut(7000);
      }
      },
      error: function(){
      $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps something happened').fadeOut(3000);
      }
    });
    }

</script>
<?}else{?>
<script type="text/javascript">
  CKEDITOR.replace( 'sectionaddBody' );
  $('#sectionadd-form').validate({
    rules:
    {
      addSection: {required:true}
    },
    message:
    {
      addSection: { required : "This field is required" },
    },
        submitHandler: addNow
  });
  function addNow(){
    CKEDITOR.instances.sectionaddBody.updateElement();
    var data = $('#sectionadd-form').serialize()+CKEDITOR.instances.sectionaddBody.getData();
    // console.log(data);
    $.ajax({
      type: "POST",
      url: "addNow",
      data: data,
      success: function(data){
        if(data==1){
          $("#logerr").addClass("alert alert-success").fadeIn().html('<span class="glyphicon glyphicon-ok"></span>').fadeOut(3000);
          $("#sectionadd-form")[0].reset();
        }
        else{
          $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span>').fadeOut(7000);
        }
      },
      error: function(){
        $("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps something happened').fadeOut(3000);
      }
    });
  }
</script>
 <? }?>
  <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>