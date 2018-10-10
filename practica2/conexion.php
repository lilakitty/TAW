<?php
//Función para hacer la conexión a la bd.
function getConnection(){

  	$host='localhost'; //Nombre del host
  	$dbname='practica2'; //Nombre de la bd
  	$user='root'; //Usuario de la bd
  	$pass=''; //Contraseña de la bd

  	$connStr="mysql:host={$host};dbname={$dbname}";
  	$opt=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'");

  	return new PDO($connStr,$user,$pass,$opt);
}
?>