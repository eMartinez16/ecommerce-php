<?php 
	require "datos.php";	
	require'carrito.php';
	include 'Templates/cabecera.php';
?>  
    <div class="row">
        <?php if ($mensaje!="") {
            echo $mensaje;
            }else{
                echo "Bienvenidos";
            }
         ?>
    </div>
    <div class="container">
    	<div class="row">
    	<?php
    		$sql= "SELECT * from productos";
    		$datos=new datos();
    		$prod=$datos->consultar($sql);

    		foreach ($prod as $key ) {
    	 ?>
		    <div class="col s12 m6 l4">
		      <div class="card">
		        <div class="card-image">
		          <img src="<?php echo $key['Imagen']?>" height='300px'>
		        </div>
		        <div class="card-content">
		          <p><?php echo $key['Nombre']?></p>
		          <h5><?php echo "$". $key['Precio']?> </h5>
		        </div>
		        <div class="card-action">		        	
		        	<form action="" method="POST" >
		        		<input  
						type="hidden" 
						name="idProducto" 
						id="idProducto" 
						value='<?php echo openssl_encrypt($key['idProducto'], COD, KEY)?>'
						>	
		        		<input 
						type="hidden" 
						name="nombre" 
						id="nombre" 
						value='<?php echo openssl_encrypt($key['Nombre'], COD, KEY)?>'
						>	
		        		<input 
						type="hidden" 
						name="cantidad" 
						id="cantidad" 
						value='<?php echo openssl_encrypt(1,COD,KEY)?>'
						>	
		        		<input 
						type="hidden" 
						name="precio" 
						id="precio" 
						value='<?php echo openssl_encrypt($key['Precio'], COD, KEY)?>'
						>	
		        		<button 
						class="waves-effect waves-light btn"  
						name='btnAccion' 
						type='submit'
		        		value='agregar'><i class="material-icons left">add</i>Añadir al carrito 
						</button>
		        	</form>
		        	

		        </div>
		      </div>
		    </div>

		  
		<?php  } ?>
		</div>
    </div>	
<?php 
include 'Templates/pie.php';
?>
    <!--- Consulta BD
    <div>
    	<table>
    			<caption>Usuarios</caption>
    			<thead>
    				<tr>
    					<td>idUsuario</td>
    					<td>Nombre</td>
    					<td>Apellido</td>
    					<td>email</td>
    					<td>contraseña</td>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<?php
    						$datos= new datos();
    						$sqlus= "SELECT * from usuarios";
    						$d= $datos->consultar($sqlus);
    						foreach ($d as $key ) {
    					?>
    					<td><?php echo $key["idUsuario"]; ?></td>
    					<td><?php echo $key['Nombre']; ?></td>
    					<td><?php echo $key['Apellido'];?></td>
    					<td><?php echo $key['Email'];?></td>
    					<td><?php echo $key['Pass'];?></td>
    					<?php
    					}
    					?>
    				</tr>
    			</tbody>
    		</table>	
    </div>	
-->
