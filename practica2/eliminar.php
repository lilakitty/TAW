<?php
//Incluye el archivo de la conexion a la bd. 
include "conexion.php";

$id=filter_input(INPUT_GET, 'id');


//Se hace la consulta para eliminar el archivo
	$db=getConnection(); 
	$sql="DELETE FROM datos WHERE id=:id";
	$stmt=$db->prepare($sql); 
	$stmt->bindParam(':id',$id);
	$stmt->execute(); 

	header('Location: listado.php');
?>