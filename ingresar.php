<?php 
	include 'Templates/cabecera.php';
	
?>
    <div class="container"> 
		<div class="row">

		    <form class="col s12 m12 l12 xl12">
		    	<h3 class='title'>Ingresar</h3>
		    	<div class="row">
			        <div class="input-field col s12">
			          <i class="material-icons prefix">person_pin</i>
			          <input id="email" type="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>	
		    	<div class="row">
			        <div class="input-field col s12">
			        	<i class="material-icons prefix">lock_outline</i>
			          	<input id="pass" type="password" class="validate">
			          	<label for="password">Contraseña</label>
			        </div>
			      </div>
			      <div class="row">
			      	<button type="submit" name='ingresar'> Ingresar</button>
			      </div>
			          		     
		    </form>
		</div>
		<a href="index.php" >Volver al inicio</a>
  	</div>
        
		
	</div>
<?php
	include 'Templates/pie.php';	
?>