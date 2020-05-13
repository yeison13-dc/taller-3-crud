<?php
	include("conexion.php");
	if(isset($_GET['pai_id']))
	{
		$pai_id=$_GET['pai_id'];
		$query="delete from pais where pai_id='$pai_id'";
		$resultado=mysqli_query($con,$query);
		if(!$resultado)
		{
			die(error);
		}
		$_SESSION['message']='se elimino el registro ok';
		$_SESSION['message_type']='primary';

		header("Location: listar.php");
	} 
 ?>