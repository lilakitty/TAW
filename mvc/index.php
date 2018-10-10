<?php
	// el index que muestra al usuario la salida de las vistas y a trevés de el enviaremos las distintas acciones del usuario al CONTROLADOR

	//MOSTRAR LA PLATILLA AL USUARIO (templete.php) LA CUAL SE ALOJARÁ EN views

	require_once ("controllers/controller.php");

	//Invocamos el modelo que se utilizara en todos los archivos.
	require_once ("models/model.php");

	//Para crear ver el templete o plantilla, se hace una peticion mediante a un controlador 
	//Creamos el objeto:
	$mvc = new MvcController();

	//Muestra la función "platilla" que se encuentra en controllers/controller
	$mvc->plantilla();

?>