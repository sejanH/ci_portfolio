<div class="content-wrapper">
	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>  <?=ucfirst($title)?>
        <small>Delete Sections</small>
      </h1>
    </section>
    <section class="content">
		<div class="row">
    	<div id="sections">
    		
    	</div>
        </div>
        <span id="logerr"></span>
    </section>

 </div>
 <script type="text/javascript">
$(function(){
	getSection();

	$('a.small-box-footer').click(function(){
	var section = $(this).attr('id');
		$.ajax({
			type: "POST",
			data: section,
			url: "remove/"+section,
			dataType: 'json',
			success: function(data){
				if(data.success){
				$("#logerr").addClass("alert alert-success").fadeIn().html('<span class="glyphicon glyphicon-ok"></span>').fadeOut(3000);
				setTimeout(getSection,3000);
			}
			else{
				$("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span>').fadeOut(7000);
				}
			},
			error: function(){
				$("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps something happened').fadeOut(3000);
			}
		});
	});


	function getSection(){
		$.ajax({
			type: "GET",
			url: "remove/sectionLoad",
			async: false,
			dataType: 'json',
			success: function(data){
					var colors = ['red','light-blue','yellow','aqua','blue','green','green-gradient','teal','olive','lime','orange','fuchsia','purple','maroon','red-gradient'];
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						var index = Math.floor(Math.random() * 15);
						html +='<div class="col-lg-3 col-xs-6">'+
					              '<div class="small-box bg-'+colors[index]+'">'+
					                '<div class="inner">'+
					                  '<h3>'+data[i].section+'</h3>'+
					                  '<p>Delete this section</p>'+
					                '</div>'+
					                '<div class="icon">'+
					                  '<i class="ion ion-trash-a"></i>'+
					                '</div>'+
					               '<a id="'+data[i].section+'" href="javascript:;" class="small-box-footer">Remove now <i class="fa fa-trash"></i></a>'+
					             '</div>'+
					           '</div>';
					}
					$('#sections').html(html);
				},
				error: function(){
					$("#logerr").addClass("alert alert-danger").fadeIn().html('<span class="glyphicon glyphicon-remove-sign"></span> Opps! fetching from database failed').fadeOut(3000);
				}
		});
	}

});
 </script>