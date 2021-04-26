<?php 
	include 'Templates/cabecera.php';
	
?>
<body>
	 <div class="container"> 
		<div class="row">
		    <form class="col s12" action='datos.php' method='Post'>
			      <div class="row">
			        <div class="input-field col s6">
				          <input placeholder="Nombre" id="nombre" type="text" class="validate">
				          <label for="first_name">Nombre</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="apellido" type="text" class="validate">
			          <label for="last_name">Apellido</label>
			        </div>
			      </div>    
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="pass" type="password" class="validate">
			          <label for="password">Contraseña</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			      	<button class="btn waves-effect waves-light" type="submit" name="insertar">Ingresar</button>
			      </div>	    		     
		    </form>
		</div>
		<a href="index.php" >Volver al inicio</a>
	</div>
<?php
	include 'Templates/pie.php';	
?>