	<?php include("includes/header.php") ?>
	<?php include("conexion.php"); ?>
	<div class="col-md-8 mx-auto">
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" class ="btn btn-warning btn-block" name= busqueda id=busqueda placeholder="que desea buscar">
			<input type="submit" class ="btn btn-success btn-block" value=Buscar class="btn_search">
		</form>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>codigo</th>
					<th>nombre</th>
					<th>descripcion</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql_registre=mysqli_query($con,"select COUNT(*) as numero_registro from pais");
					$resul=mysqli_fetch_array($sql_registre);
					$total=$resul['numero_registro'];
					$por_pagina = 5;

					if(empty($_GET['pagina']))
					{
						$pagina = 1;
					}
					else
					{
						$pagina= $_GET['pagina'];
					}
					$desde = ($pagina-1)*$por_pagina;
					$total_paginas = ceil($total/$por_pagina);


					$query="select * from pais order by (pai_nom) asc limit $desde,$por_pagina ";
					$res_tot=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($res_tot)) {?>
						<tr>
							<td><?php echo $row['pai_id'] ?></td>
							<td><?php echo $row['pai_nom'] ?></td>
							<td><?php echo $row['pai_des'] ?></td>
							<td>
								<a href="editar.php?pai_id=<?php echo $row['pai_id'] ?>" class="btn btn-secondary">
									<i class="fas fa-marker"> </i></a>
								<a href="eliminar.php?pai_id=<?php echo $row['pai_id'] ?>"class="btn btn-danger">
									<i class="far fa-trash-alt"></i></a>
							</td>
						</tr>
					<?php } ?>	 
			</tbody>
		</table>
		<div class="paginador">
				<ul>
					<?php if($pagina != 1) { ?>
					<ld><a href="?pagina= <?php echo 1 ?>"class="btn btn-primary">|<</a></ld>
					<ld><a href="?pagina= <?php echo $pagina-1 ?>"class="btn btn-primary"><<</a></ld>
					<?php } for ($i=1; $i<=$total_paginas ; $i++) { 
						if($i == $pagina)
						{
							echo '<ld class="pageSelected" > '.$i.'</ld>';
						}else{
							echo '<ld><a href="?pagina='.$i.'"> '.$i.'</a></ld>';
						}
						
					}
					if($pagina != $total_paginas){
					?>
					<ld><a href="?pagina= <?php echo $pagina+1 ?>"class="btn btn-primary">>></a></ld>
					<ld><a href="?pagina=<?php echo $total_paginas ?>"class="btn btn-primary">>|</a></ld>
				<?php } ?>
				</ul>
			</div>
	</div> 


<?php include("includes/footer.php") ?>
