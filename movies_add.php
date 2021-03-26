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
	//get movies list
	$movies_list	=	$obj->get_movies();
	
	?>
	
	<div class="container">
	<div class="row">
	<?php
		if(isset($_GET['msg'])){
			echo success_msg($_GET['msg']);
		}
		?>
		<div class="col-sm-12 row" style="padding:0px;">
			<div class="col-sm-3">
				<a href="movies_add_new.php">
					 <button class="btn btn-warning" type="button">Create New Movie</button>
				</a>
				<br/><br/>
			</div>
			
			<div class="col-sm-12">
				<table class="table" style="width:100%;">
					<thead>
						<tr>
							<th>Movie Name</th>
							<th>Movie Genre</th>
							<th>Date</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							//go through movies list and output
							foreach($movies_list as $row){?>
							<tr style="background: #575757;">
								<td><?php echo $row->movieName;?> </td>
								<td><?php echo $row->movieGenre;?> </td>
								<td><?php echo $row->releaseDate;?> </td>
								<td><a href="movie_edit.php?id=<?php echo ($row->id);?>"><button class="btn btn-info" type="button">Update</button></td>
								<td><a href="movie_delete.php?id=<?php echo ($row->id);?>"><button class="btn btn-danger" type="button">Delete</button></td>
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