<?php
include "db.php";

$idNoticia = $_GET["noticia"];

if(isset($_POST["enviar"])){
                   
    $nick=$_POST["nombre"];
    $mensaje=$_POST["mensaje"];
    
    $consulta = "INSERT INTO comentario (autor,comentario,fecha,id_noticia) VALUES ('$nick','$mensaje', now() , $idNoticia )";

    $run = $db->query($consulta);

    if($run){
        header("Location: noticia.php?noticia=$idNoticia");
    }else{
        echo "ERROR AL ENVIAR EL MENSAJE";
    }
}


?>