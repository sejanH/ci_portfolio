<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <i class="fa fa-database" aria-hidden="true"></i> Database
        <small>Manage Database Content</small>
      <span style="float: right" title="Warning" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="You must have basic knowledge of SQL"><small>&laquo; more &raquo;</small></span>
      </h1>
    </section>

    <section class="content">
    <button id="addTableForm" class="btn btn-mybtn btn-flat btn-sm">Add a new table</button>
    <button id="phpmyadmin" class="btn btn-mybtn btn-sm btn-flat">goto phpmyadmin</button>
    <div id="tables">
    <table class="table table-responsive table-hover">
    <tr>
    	<th>Table name</th>
    	<th>Columns</th>
    </tr>
    	<?
    	foreach ($tables as $t) {
    		$fields = $this->db->field_data($t);
    		echo "<tr><th>".$t."</th>";
    		foreach ($fields as $f) {
				$fields = $this->db->field_data($t);?>
    			<td title="<?=$f->type?>"><?=$f->name?><br/><small>(<?=$f->type."<small>[".$f->max_length."]</small>"?>)</small>
    			</td>
    	<?	}
    		echo "</tr>";
    	}
    	?>
    </table>
    </div>

    <div id="addTables" hidden>
    	<div class="col-sm-2">
	    	<input type="number" class="form-control" id="no-of-columns" min="1" value="1" />
	    </div><br/>
	    <div class="col-sm-6">
	    	<div id="addForm">
	    		<form method="post" class="form-horizontal" id="Form">
		    		<div id="formFields">
		    			
		    		</div>
		    		<input type='submit' id='savebutton' value='Save' class='btn btn-mybtn btn-sm'/>
	    		</form>
	    	</div>
	    </div>
    </div>

    </section>



  </div>
  </div>

  <script type="text/javascript">
  	$("#addTableForm").click(function(){
  		$("#tables,#addTables").slideToggle();
  	});

  	$("#no-of-columns").on("change",function(){
  			//$("#formFields").remove();
  		var value = this.value;
		    $('#formFields').append("<input type='text' placeholder='Name' name='name' id='rname' class='form-control'/>");
		    $('#formFields').append("<input type='text' placeholder='description' id='rdescription' name='routedescription' class='form-control'/>");
		    $('#formFields').append("<input type='text' placeholder='tags' id='tags' name='routetags' class='form-control'/>");
		  	});

    $("#phpmyadmin").click(function(){
      var url ='<?=base_url()?>admin/database/phpmyadmin?server=<?=$server?>&username=<?=$user?>&db=<?=$database?>&password=<?=$password?>';
      // var url ='<?=base_url()?>admin/database/phpmyadmin?server=<?=base64_decode($server)?>&username=<?=base64_decode($user)?>&db=<?=base64_decode($database)?>&password=<?=base64_decode($password)?>';
      window.location = url;
    });
  </script>