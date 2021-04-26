<?php
	require 'datos.php';
	$nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$email= $_POST['email'];
	$pass= $_POST['pass'];
	$usuario= new datos();
	$usuario->insertar($nombre, $apellido,$email, $pass);	
?>