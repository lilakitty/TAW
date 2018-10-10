<?php
//Se inicia una sesión
session_start();
//Se valida que haya una sesión, sino la hay la página se redirecciona al apartado de ingresar.
if(!$_SESSION["validar"]){
	header("location:index.php?action=ingreso");
	exit();
}
?>

<h1>LISTA DE USUARIOS</h1>

<div class="col-sm-12">
          <table>
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Contraseña</th>
                  <th>Correo</th>
                  <th></th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
                <?php
                  //Se manda a llamar el controlador
                  $listar= new MvcController();
				  //Se manda a llamar las funciones de mostrar y modificar
				  $listar->listarUsuariosController();
  				  $listar->eliminarUsuariosController();
                ?>
              </tbody>
          </table>

    </div>
