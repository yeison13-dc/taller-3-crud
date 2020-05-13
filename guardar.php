<?php
	
	include("conexion.php");

	if(isset($_POST['guardar'])){
		$titulo = $_POST['title'];
		$nombre= $_POST['nombre'];
		$descripcion= $_POST['description'];
		
	 
		$query = "insert into pais(pai_id,pai_nom,pai_des) values ('$titulo','$nombre','$descripcion')";
		$rta=mysqli_query($con, $query);
		if(!$rta){
			die("ERROR");
		}
		
		$_SESSION['message'] = 'se guardo correctamente';
		$_SESSION['message_type'] = 'success';

		header("Location: index.php");
	}
	
 ?>
