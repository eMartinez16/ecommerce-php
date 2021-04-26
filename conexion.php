<?php
	//LLave encript
	define("KEY","eMart");
 		//encript
 	define("COD","AES-128-ECB");

 	class conexion{
 		private $servidor="localhost";
 		private $usuario="root";
 		private $pass="";
 		private $bd="ecommerce";
 		
 	
 		public function conectar(){ 			
 			$conexion=mysqli_connect( $this->servidor, 
						 			  $this->usuario, 
						 			  $this->pass,
						 			  $this->bd);
 			return $conexion;

 		}
 	}
?>