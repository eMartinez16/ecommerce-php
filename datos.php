<?php	
	require "conexion.php";
	class datos 
	{
		public function consultar($sql){	
			 $conn= new conexion();
			 $con=$conn->conectar();
			 $resultado=mysqli_query($con, $sql);
			 return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
			 
		}
		public function consultarId($sql){	
			 $conn= new conexion();
			 $con=$conn->conectar();
			 $resultado=mysqli_query($con, $sql);
			 //Me muestra el primer dato de un arreglo, en esta caso lo utilizo para mostrar el ultimo ID de la tabla Ventas (Me muestra array(MAX -> [id]) como arreglo)
			 $row = $resultado->fetch_array()[0];
			 return $row;
			 
		}

		public function insertar($sql){
			$conexion= new conexion();
			$con= $conexion-> conectar();		
			if(mysqli_query($con, $sql)){
				echo "Datos cargados correctamente..";
				//echo "<a href='index.php'> Volver al inicio </a>";
			}
			else{
				echo 'Fallo ';
				echo "Error:".mysqli_error($con);
			}							
			mysqli_close($con);
		}

		public function actualizar(){

		}

		public function borrar(){

		}

	}

	
?>