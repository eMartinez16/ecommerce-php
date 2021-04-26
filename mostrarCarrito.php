<?php 
	require "datos.php";	
	require'carrito.php';
	include 'Templates/cabecera.php';
?>
<br>
<div class="container">
<h3>Listado del carrito</h3>
<?php 
	$total=0;
	if (!empty($_SESSION['Carrito'])){
?>

	<table class='table-responsive'>
		<thead>
			<tr>
				<th width='40%'>Descripcion</th>
				<th width='15%'>Cantidad</th>
				<th width='20%'>Precio</th>
				<th width='20%'>Total</th>
				<th width='5%'>--</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION['Carrito'] as $indice=>$producto) {
			 ?>
			<tr>
				<td width='40%'><?php echo $producto['Nombre']?></td>
				<td width='15%'><?php echo $producto['Cantidad'] ?></td>
				<td width='20%'><?php echo $producto['Precio']?></td>
				<td width='20%'><?php echo number_format($producto['Precio'] * $producto['Cantidad'] )?></td>
				<td width='5%'>
					<form action="" method="POST">
						<input 
						type="hidden" 
						name="idProducto" 
						id="idProducto" 
						value='<?php echo openssl_encrypt($producto['idProducto'], COD, KEY)?>'
						>

						<button class='btn waves-effect waves-light red' 
						type='submit' 
						name='btnAccion' 
						value='Eliminar'>Eliminar</button>
					</form>
					

				</td>
			</tr>
			<?php
			$total=$total+($producto['Precio'] * $producto['Cantidad'] );
			} ?>
			<tr>
				<td colspan='3' ><h5 class='right-align'>TOTAL</h5></td>
				<td align="right"> <h4>$ <?php  echo number_format($total,2)?></h4></td>
			</tr>
			<tr>
				<td colspan="5" class=''>
					<br>
					<form class="col s12" action='pagar.php' method='POST'>
						<div class="input-field col s12">
							<label class='black-text'>Correo de contacto</label>
							<input type="email" name="email" id="email" placeholder="Por favor escribe tu correo" required class="validate">
						</div>
						<small
						id='emailHelp' class='helper-text';						
						>
							Los productos se enviaran a este correo
						</small>
						<br>
						<button type="submit" class="btn waves-effect waves-light" name='btnAccion' value='proceder'> Proceder a pagar</button>
					</form>
					
				</td>
			</tr>
		</tbody>
	</table>

	<?php 
	}
	else{?>
		<div >
			No hay productos en el carrito
		</div>
	<?php
	}
	?>
	</div>
<?php
	echo "<a href='index.php' >Volver al inicio</a>";

include 'Templates/pie.php';
?>