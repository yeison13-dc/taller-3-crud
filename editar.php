<?php
	include("conexion.php");
	if(isset($_GET['pai_id']))
	{
		$pai_id=$_GET['pai_id'];
		$query="select * from pais where pai_id='$pai_id'";
		$resultado=mysqli_query($con,$query);
		if(mysqli_num_rows($resultado)==1)
		{
			$row = mysqli_fetch_array($resultado);
			$codigo = $row['pai_id'];
			$nombre = $row['pai_nom'];
			$description=$row['pai_des'];
			
		}
	}

	if(isset($_POST['actualiza']))
	{
		$pai_id=$_GET['pai_id'];
		$title=	$_POST['title'];
		$description= $_POST['description'];
		$nombre=$_POST['nombre'];

		$query="update pais set pai_id = '$title', pai_nom='$nombre',pai_des='$description' where pai_id='$pai_id'";
		mysqli_query($con,$query);

		$_SESSION['message'] = 'se actualizo correctamente';
		$_SESSION['message_type'] = 'info';
		header("Location: listar.php");
	}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card-card-body">
				<form action="editar.php?pai_id=<?php echo $_GET['pai_id'] ?>" method="POST">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $codigo; ?>"
						class ="form-control" placeholder = "actualiza el codigo del pais">
					</div>
					<div class="form-group">
						<input type="text" name="nombre" value="<?php echo $nombre; ?>"
						class ="form-control" placeholder = "nuevo nombre del pais">
					</div>
					<div class="form-group">
						<textarea name="description"  rows="4" class ="form-control" placeholder="actualizar descripcion"><?php echo $description ?></textarea>
					</div>
					<button class="btn btn-success" name="actualiza">
						actualiza
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php") ?>