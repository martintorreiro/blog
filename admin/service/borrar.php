<?php

include "../db.php";

if(isset($_GET["categoria"])){

    $categoria = $_GET["categoria"];

    $consulta =  "DELETE FROM categoria WHERE id=$categoria";

    $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-categorias.php?res-delete=ok");
    }else{
        header("Location: ../listar-categorias.php?res-delete=err");
    };
}else if(isset($_GET["autor"])){

    $categoria = $_GET["autor"];

    $consulta =  "DELETE FROM autor WHERE id=$categoria";

    $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-autores.php?res-delete=ok");
    }else{
        header("Location: ../listar-autores.php?res-delete=err");
    };
}else if(isset($_GET["noticia"])){

    $noticia = $_GET["noticia"];

    $consulta =  "DELETE FROM noticia WHERE id=$noticia";

    $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-noticias.php?res-delete=ok");
    }else{
        header("Location: ../listar-noticias.php?res-delete=err");
    };
}else if(isset($_GET["foto"])){

    $id = $_GET["id"];
    $foto = $_GET["foto"];

    $consulta =  "DELETE FROM fotos WHERE id=$id";
    $res = $db->query($consulta);

     if($res){
        unlink("../../fotos-noticias/$foto");
        $respuesta = array();
        $respuesta['resultado']=1;
        $respuesta['mensaje']="La foto ha sido borrada";
    }else{
        $respuesta = array();
        $respuesta['resultado']=0;
        $respuesta['mensaje']="Error al eliminar la imagen";
    }; 

    echo json_encode($respuesta);
}

?>