<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>
	<header id="header" class="">
		<nav>
		    <div class="nav-wrapper black">
		      <a href="index.php" class="brand-logo">ECOMMERCE EMI</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <!--<li><a href="ingresar.php">Iniciar sesión</a></li>
		        <li><a href="registrar.php">Registrar</a></li>  -->
		        <li><i class="material-icons prefix">shopping_cart</i></li>
		        <li><a href="mostrarCarrito.php">Carrito (<?php 
			    	echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);
			    	?>)</a></li>
		      </ul>
		    </div>
		    <ul class="sidenav" id="mobile-demo">

			    <!--<li><a href="ingresar.php"><i class="material-icons prefix ">person_pin</i>Iniciar sesión</a></li>
			    <li><a href="registrar.php"><i class="material-icons prefix ">person_pin</i>Registrar</a></li> -->
			    
			    <li><a href="mostrarCarrito.php"><i class="material-icons prefix ">shopping_cart</i>Carrito(<?php 
			    	echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);

			    	?>) </a> </li>
			    
			</ul>
		</nav>
    </header><!-- /header -->
