<?php 
	print_r($_GET);
	$ClientId="ASoOAJxJoW1i9sNip16kMrZCbGNP43NEVzifFXifP6LrvBlerWU1IQhAwld3IwvbMb8mzNf0VNEsx4an";
	$secret="EKcGPvFceHxv1phB9kKHZz1hlA8yJiI-x8gSelWp3U6V4zuSSMp0pXIW_NY3B1sPBhcoEPjJosE_xMdF";

	//Curl nos sirve para hacer solicitudes a traves de un cliente o un mecanismo de solicitud de datos
	$login=curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");

	//para que la api devuelta la info
	curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);

	curl_setopt($login, CURLOPT_USERPWD, $ClientId.":".$secret);

	//Envia las credenciales por post
	curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

	$respuesta= curl_exec($login);

	
	$objRespuesta=json_decode($respuesta);
	$accessToken=$objRespuesta->access_token;
	
	print_r($accessToken);

	$venta=curl_init("https://api-m.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentId']);


	curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$accessToken));
	$respuestaVenta=curl_exec($venta);

	print_r($respuestaVenta);
	print_r($_POST);
	



?>