<?php 
	session_start(); 
$mensaje="";
	if (isset($_POST['btnAccion'])) {
		
		switch ($_POST['btnAccion']) {
			case 'agregar':
			//Pregunta si los valores corresponden al tipo de dato y luego los desencripta, guarda dicha información en una variable y muestra un mensaje.
				if (is_numeric(openssl_decrypt($_POST['idProducto'], COD, KEY))) {
					$id = openssl_decrypt($_POST['idProducto'], COD, KEY);
					$mensaje = 'OK id correcto '.$id;
				}
				else{
					$mensaje = 'Upss id incorrecto '.$id;
				}
				if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
					$nombre= openssl_decrypt($_POST['nombre'], COD, KEY);
				}		else{ $mensaje = 'Upss Nombre incorrecto '.$id;
				}
				if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
					$cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
				}else{		$mensaje = 'Upss cantidad incorrecto '.$id;
				}
				if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
					$precio = openssl_decrypt($_POST['precio'], COD, KEY);
				}	else{	$mensaje = 'Upss precio incorrecto '.$id;
				}

				if (!isset($_SESSION['Carrito'])) {
					//Si no existe la variable de sesion, recupera la informacion y la guarda en una variable, luego crea en en la posicion 0 un producto.
					$producto=array(	
						'idProducto'=>$id,
						'Nombre'=>$nombre,
						'Cantidad'=>$cantidad,
						'Precio'=>$precio
					);
					//En la variable de session carrito
					$_SESSION['Carrito'][0]=$producto;
					$mensaje="Producto agregado al carrito";
				}
				else{
					//Guarda en un array column todos los id del carrito. Luego pregunta que si el id que se quiere agregar al carrito, ya esta seleccionado, sale un cartel
					$idProductos= array_column($_SESSION['Carrito'], "idProducto");
					if (in_array($id, $idProductos)) {
						echo "<script> alert('El producto ya ha sido seleccionado..');</script>";
						$mensaje="";
					} else {
						//Si existe algo en el producto, cuenta cuantos productos hay en el carrito, y se almacena en la variable numeroProductos, y eso se almacena en la variable de sesion.
						$numeroProductos=count($_SESSION['Carrito']); 			//Cuenta el carrito de compras
						$producto=array(	
							'idProducto'=>$id,
							'Nombre'=>$nombre,
							'Cantidad'=>$cantidad,
							'Precio'=>$precio
						);

						$_SESSION['Carrito'][$numeroProductos]=$producto;
						$mensaje="Producto agregado";
						}
				}
				//$mensaje= print_r($_SESSION,true);
			break;
			case 'Eliminar':
				if (is_numeric(openssl_decrypt($_POST['idProducto'], COD, KEY))) {
					$id =openssl_decrypt($_POST['idProducto'], COD, KEY);
					//Recorre todos los id que esten guardados en el carrito y borra el que se desea
					foreach ($_SESSION['Carrito'] as $indice=>$producto) {
						if ($producto['idProducto']==$id) {
							unset($_SESSION['Carrito'][$indice]);
							echo "<script>alert('Elemento eliminado');</script>";
							
						}
					}
				}				
			break;
		}
	}

 ?>