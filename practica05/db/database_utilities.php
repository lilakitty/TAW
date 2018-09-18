<?php
	require_once('database_credentials.php');

	//Se realiza la conexion a la base de datos, utilizando las constantes definidas en database_credentials.php
	$host = DB_HOST;
	$dbname = DB_DATABASE;
  	$conn = new PDO("mysql:host={$host};dbname={$dbname}", DB_USER, DB_PASSWORD);
	
	//Funcion que permite agregar un nuevo users a la base de datos, requiere nombre y correo.
	function add($nombre,$correo){
		global $conn;
		$stmt = $conn->prepare('INSERT INTO users (nombre,correo)'.'VALUES (:nombre,:correo)');
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':correo',$correo);
		$stmt->execute();

		
	}

	//Funcion que permite actualizar los atributos de un users existente, requiere nombre, correo y su id.
	function update($id,$nombre,$correo){
		global $conn;
		$stmt = $conn->prepare("UPDATE users SET nombre=:nombre, correo=:correo where id=:id");
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':correo',$correo);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	//Funcion que permite eliminar un users de la base de datos utilizando su id.
	function delete($id){
		global $conn;
		$stmt = $conn->prepare("DELETE FROM users where id=:id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	//Funcion que permite obtener todos los registros encontrados en la tabla userss de la base de datos.
	function get_all(){
		global $conn;
		$stmt = $conn->prepare('SELECT * FROM users');
		$stmt->execute();
		
		return $stmt->fetchAll();
		
	}

	//Funcion que permite realizar una busqueda de un users para obtener todos sus atributos mediante su id.
	function search($id){
		global $conn;
		$stmt =$conn->prepare( "SELECT * FROM users where id=:id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
?>