<?php

include "../db.php";

/* ----------------------------GUARDAR CATEGORIA------------------------------------- */

if(isset($_POST["guardar_cat"])){

    $categoria=$_POST["categoria"];
    $consulta = "INSERT INTO categoria (nombre) VALUE ('$categoria')";
    $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-categorias.php?resCat=ok");
    }else{
        header("Location: ../listar-categorias.php?resCat=err");
    };
    

    /* ----------------------------GUARDAR AUTOR------------------------------------- */

}else if(isset($_POST["guardar_aut"])){

    $nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
    $contraseña=md5($_POST["contraseña"]);
    $archivo = $_FILES['imagen']['name'];



    if(isset($archivo)&&$archivo != ""){
        
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];
       
       if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            
            header("Location: ../listar-autores.php?resCat=err");
            exit;

        }else {
           
            if (move_uploaded_file($temp, '../../fotos-usuarios/'.$archivo)) {
               
                chmod('../../fotos-usuarios/'."$archivo", 0777);
               
                $consulta =  "INSERT INTO autor (nombre,foto,usuario,contraseña) VALUES ('$nombre','$archivo','$usuario','$contraseña')";
                $res = $db->query($consulta);
              
                if($res){
                    header("Location: ../listar-autores.php?resCat=ok");
                    exit;
                }else{
                    header("Location: ../listar-autores.php?resCat=err");
                    exit;
                }            
            }
            else {
        
                header("Location: ../listar-autores.php?resCat=err");
                exit;
            }
          }
        
    }else{

        $consulta = "INSERT INTO autor (nombre,usuario,contraseña) VALUE ('$nombre','$usuario','$contraseña')";

        $res = $db->query($consulta);
    
        if($res){
            header("Location: ../listar-autores.php?resCat=ok");
        }else{
            header("Location: ../listar-autores.php?resCat=err");
        };
    

    }


/* ----------------------------GUARDAR NOTICIA------------------------------------- */
   
}else if(isset($_POST["guardar_not"])){

    $titulo=$_POST["titulo"];
    $intro=$_POST["intro"];
    $texto=$_POST["texto"];
    $fecha=$_POST["fecha"];
    $autor=$_POST["autor"];
    $categoria=$_POST["categoria"];
    $archivo = $_FILES['imagen']['name'];



    if(isset($archivo)&&$archivo != ""){
        
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];
       
       if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            
            header("Location: ../listar-noticias.php?resCat=err");
            exit;

        }else {
           
            if (move_uploaded_file($temp, '../../fotos-noticias/'.$archivo)) {
               
                chmod('../../fotos-noticias/'."$archivo", 0777);
               
                $consulta =  "INSERT INTO noticia (titulo,intro,texto,fecha,id_autor,id_categoria,foto) 
                            VALUES ('$titulo','$intro','$texto','$fecha','$autor','$categoria','$archivo')";
                $res = $db->query($consulta);
              
                if($res){
                    header("Location: ../listar-noticias.php?resCat=ok");
                    exit;
                }else{
                    header("Location: ../listar-noticias.php?resCat=err");
                    exit;
                }            
            }
            else {
        
                header("Location: ../listar-noticias.php?resCat=err");
                exit;
            }
          }
        
    }else{

        $consulta = "INSERT INTO noticia (titulo,intro,texto,fecha,id_autor,id_categoria) 
                    VALUES ('$titulo','$intro','$texto','$fecha','$autor','$categoria')";

        $res = $db->query($consulta);
    
        if($res){
            header("Location: ../listar-noticias.php?resCat=ok");
        }else{
            header("Location: ../listar-noticias.php?resCat=err");
        };
    

    }


}


?>