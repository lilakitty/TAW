<?php

class Conexion{
	public function conector(){
		$link = new PDO("mysql:host=localhost;dbname=tutorias","root","");
		return $link;
	}
}

?>