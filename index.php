<?php include ("conexion.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-4">
	
	<div class="row">
		
		<div class="col-md-4 mx-auto">
			<?php  if(isset($_SESSION['message'])){ ?>
				
				<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
  				<?= $_SESSION['message'] ?>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>

			<?php session_unset(); } ?>

			<div class="card card-body">
				
				<form action="guardar.php" method="POST">
					<div class="form-group">
						<input type="text"id=codigo_id name="title" class="form-control"
						placeholder="codigo del pais" autofocus>
					</div>
					<div class="form-group">
						<input type="text" id=nombre_id name="nombre" class="form-control"
						placeholder="nombre del pais" autofocus>
					</div>
					<div class="form-group">
						<textarea id=descripcion_id name="description"  rows="4" class ="form-control"
						placeholder="descripcion"></textarea>
					</div>
					<input type="submit" class ="btn btn-success btn-block" name="guardar" value="registrar" 
					onclick="return validar()">
					
				</form>

				

				<form action="listar.php">
					<input type="submit" class ="btn btn-primary btn-block" name="mostrar" value="listar">
				</form>
				

				<script>
					var codigo_e = document.getElementById('codigo_id');
					var nombre_e = document.getElementById('nombre_id');
					var descripcion_e = document.getElementById('descripcion_id');

					function validar(){
						var mensajeerror=[];
						if(codigo_e.value === null || codigo_e.value === '')
						{
							mensajeerror.push('debe ingresar un codigo');
						}
						if(nombre_e.value === null || nombre_e.value === '')
						{
							mensajeerror.push('debe ingresar un nombre');
						}

						if(mensajeerror.length != 0)
						{
							mensajeerror.join(', ');
							alert(mensajeerror);
							return false;
						}
						return true;
					}
				</script>
			</div>
		</div>
	</div>
</div>
<?php include("includes/footer.php") ?>