<?php
$bd = new mysqli("localhost", "root", "", "blog2");
if ($bd->connect_errno) {
    header("Location: 404.php");
}

$bd->set_charset("utf8mb4");

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

if ($clave==""){
    header("Location: login.php");
    die();
}

$clave=md5($clave);

$sql ="SELECT * FROM autor WHERE usuario='$usuario' AND contraseña='$clave'";
$result = $bd->query($sql);

 if ($result->num_rows==1){
    if ($fila=$result->fetch_assoc()){
        session_start();
        $_SESSION['id_autor']=$fila['id'];
        $_SESSION['nombre_autor']=$fila['nombre'];
        header("Location:index.php");
    }else{
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
} 


?>