<?php
session_start();

unset($_SESSION['id_autor']);
unset($_SESSION['nombre_autor']);

header("Location: login.php");
?>