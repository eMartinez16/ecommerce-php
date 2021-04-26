<?php 
	include 'datos.php';
	include 'carrito.php';
	include 'Templates/cabecera.php';
 ?>
 <?php 
 	if ($_POST) {
 		$total=0;
 		//Se guarda el id de la sesion
 		$SID=session_id();
 		$clave=md5('123123');
 		$correo=$_POST['email'];

 		foreach ($_SESSION['Carrito'] as $indice=>$producto) {
 				$total=$total+($producto['Precio'] * $producto['Cantidad']);
 		}
 		$dato= new datos();

 		$sentencia= "INSERT INTO `ventas` (`idVenta`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES (NULL, '$clave', '', NOW(), '$correo', '$total', 'pendiente')";

 		$dato->insertar($sentencia);
 		$sql='SELECT max(idVenta) from ventas ';

 		//Ultimo ID venta
 		$idVenta= $dato->consultarId($sql);
 		foreach ($_SESSION['Carrito'] as $indice=>$producto) {
 				$idProd=$producto["idProducto"];
 				$precio=$producto["Precio"];
 				$cantidad=$producto["Cantidad"];
 				$sentencia2="INSERT INTO `detalleventa` (`idDetalle`, `idVenta`, `idProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) VALUES (NULL, '$idVenta', '$idProd', '$precio', '$cantidad', '0')";
 				$dato->insertar($sentencia2);

 		}	
 	}
  ?>
  <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <div class='container'>
  	<h1>¡Paso final!</h1>
  	<hr>
  	<!-- Elija el medio de pago-->
  	<p>Estas a punto de pagar con paypal la cantidad de : <h4> <?php echo number_format($total, 2) ?></h4></p>
    <!-- Set up a container element for the button -->
    <div id="paypal-button"></div>
	<script>
	  paypal.Button.render({
	    // Configure environment
	    env: 'sandbox',
	    client: {
	      sandbox: 'ASoOAJxJoW1i9sNip16kMrZCbGNP43NEVzifFXifP6LrvBlerWU1IQhAwld3IwvbMb8mzNf0VNEsx4an',
	      production: 'demo_production_client_id'
	    },
	    // Customize button (optional)
	    locale: 'en_US',
	    style: {
	      size: 'responsive',
	      color: 'gold',
	      shape: 'pill',
	    },

	    // Enable Pay Now checkout flow (optional)
	    commit: true,

	    // Set up a payment
	    payment: function(data, actions) {
	      return actions.payment.create({
	        transactions: [{
	          amount: {
	            total: '<?php echo $total; ?>',
	            currency: 'MXN'
	            },
	            description: 'Compra de productos a Emiliano Martinez: $<?php echo number_format($total,2);?>',
	            custom:'<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta, COD, KEY);?>'
	          
	        }]
	      });
	    },
	    // Execute the payment
	    onAuthorize: function(data, actions) {
	      return actions.payment.execute().then(function() {
	        // Show a confirmation message to the buyer
	        //window.alert('Thank you for your purchase!');
	        console.log(data);
	        window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentId="+data.paymentID;
	      });
	    }
	  }, '#paypal-button');

	</script>
    
  </div>

 <?php  include 'Templates/pie.php'; ?>
