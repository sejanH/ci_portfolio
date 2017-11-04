<div class="content-wrapper">
	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user" aria-hidden="true"></i> About->Team Page
        <small>Manage Page Content</small>
      <span style="float: right" title="Warning" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="You must have basic knowledge of HTML(table) and CSS(Bootstrap)"><small>&laquo; more &raquo;</small></span>
      </h1>
    </section>

<section class="content">
<a href="../../team" class="btn btn-mybtn btn-sm">back</a>
<?

	foreach ($content as $row) { ?>
		<form method="post" action="../editTeamById/<?=$row->id?>" class="form-horizontal" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-3"><input class="form-control" name="tname" placeholder="Name" value="<?=$row->name?>" /></div>
			<div class="col-md-3"><input class="form-control" name="tposition" placeholder="Position" value="<?=$row->position?>" /></div>
			<div class="col-md-3"><input class="form-control" name="tcontact" placeholder="Contact details" value="<?=$row->contact?>" /></div>
			<div class="col-md-2"><input type="file" name="tfiles" /></div>
		</div>
			<textarea class="form-control" name="tbody" placeholder="Profile body"><?=$row->body?></textarea>
			<input type="submit" value="Edit this team member" class="btn btn-mybtn btn-flat" />
		</form>
			
	<?
	}
?>
</section>
</div>
</div>