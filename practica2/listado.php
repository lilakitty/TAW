<?php
//incluimos la conexión a la bd
include "conexion.php";

$db = getConnection();
$stmt=$db->prepare('SELECT * FROM datos'); //Se hace la consulta para seleccionar los datos de la tabla. 
$stmt->execute();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Practica 2: Litado</title>
</head>
<body>

	<table>
			<thead>
				<tr>
					<th>Nombre</th><th>Apellido</th><th>Genero</th><th>Editar</th><th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php while($r=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
					<tr>
						<td><?=$r['nombre']?></td>
						<td><?=$r['apellido']?></td>
						<td><?=$r['genero']?></td>
						<td><a href="editarform.php?id=<?=$r['id']?>">Editar</a></td>
						<td><a href="eliminar.php?id=<?=$r['id']?>">Eliminar</a></td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>

</body>
</html>