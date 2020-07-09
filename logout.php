<?php

session_start();
unset($_SESSION['id_usuario']);
unset($_SESSION['usuario']);

header('location: index.php');

?>