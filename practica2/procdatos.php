<?php
include "conexion.php"; //Incluimos el archivo de la conexion a la bd.

//Obtenemos los datos del formulario
$nombre = filter_input(INPUT_POST, 'nombre');
$apellido = filter_input(INPUT_POST, 'apellido');
$genero = filter_input(INPUT_POST, 'genero');

$db = getConnection();
//Hacemos la consulta para insertar un nuevo registro en la tabla datos
$stmt=$db->prepare('INSERT INTO datos (nombre, apellido, genero)' .
                  'values (:nombre, :apellido, :genero)');

$stmt->bindParam(':nombre',$nombre);
$stmt->bindParam(':apellido',$apellido);
$stmt->bindParam(':genero',$genero);
$stmt->execute();

header('Location: mensaje.php')


?>