<?php
	//including config and header files
	$login_type	=	"admin";
	include("includes/config.php");
	include("theme/header.php");
	include("theme/navigation.php");
?>
<?php
	include("includes/Posts_class.php");
	
	$obj			=	new Posts_class();
	//get theater list
	$theater_list	=	$obj->get_theaters();
	
	?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-12 row" style="padding:0px;">
			<div class="col-sm-3">
				<a href="theaters_add_new.php">
					 <button class="btn btn-warning" type="button">Create New Theater</button>
				</a>
				<br/><br/>
			</div>
			
			<div class="col-sm-12">
				<table class="table" style="width:100%;">
					<thead>
						<tr>
							<th>Theater Name</th>
							<th>Location</th>
							<th>Edit</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							//go through movies list and output
							foreach($theater_list as $row){?>
							<tr style="background: #575757;">
								<td><?php echo $row->theaterName;?> </td>
								<td><?php echo $row->location;?> </td>
								<td><a href="theater_edit.php?id=<?php echo ($row->id);?>"><button class="btn btn-info" type="button">Update</button></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
			</div>
		</div>
	
	</div>
	</div>
	<?php include("theme/footer.php");?>