<h1>SALIR</h1>
<?php

session_start();
session_destroy();
header('Location: index.php?action=ingreso');

?>