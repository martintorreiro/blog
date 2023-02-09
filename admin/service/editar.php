<?php

include "../db.php";

/* ----------------------------EDITAR CATEGORIA------------------------------------- */

if(isset($_POST["editar_cat"])){

    $id = $_POST["categoria"];
    $nuevoNombre = $_POST["nombre"];


    $consulta =  "UPDATE categoria SET nombre = '$nuevoNombre'  WHERE id=$id";

    $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-categorias.php?res-edit=ok");
    }else{
        header("Location: ../listar-categorias.php?res-edit=err");
    };


    /* ----------------------------EDITAR AUTOR------------------------------------- */

}else if(isset($_POST["editar_aut"])){

    $id = $_POST["autor"];
    $nuevoNombre = $_POST["nombre"];
    $nuevoUsuario = $_POST["usuario"];
    $nuevaContraseña = $_POST["contraseña"];
    $archivo = $_FILES['imagen']['name'];


     if(isset($archivo)&&$archivo != ""){
        
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];
       
       if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            
            header("Location: ../listar-autores.php?res-edit=err");
            exit;

        }else {
           
            if (move_uploaded_file($temp, '../../fotos-usuarios/'.$archivo)) {
               
                chmod('../../fotos-usuarios/'."$archivo", 0777);
               
                $consulta =  "UPDATE autor SET nombre = '$nuevoNombre', foto = '$archivo',  usuario= '$nuevoUsuario'  WHERE id=$id";
                $res = $db->query($consulta);

                if(strlen($nuevaContraseña)>0){
                    $contraseñaEncriptada = md5($nuevaContraseña);
                    echo $contraseñaEncriptada;
                    $db->query("UPDATE autor SET contraseña ='$contraseñaEncriptada'  WHERE id=$id");
                } 
              
                if($res){
                    header("Location: ../listar-autores.php?res-edit=ok");
                    exit;
                }else{
                    unlink('../../fotos-usuarios/'.$archivo);
                    header("Location: ../listar-autores.php?res-edit=err");
                    exit;
                }            
            }
            else {
        
                header("Location: ../listar-autores.php?res-edit=err");
                exit;
            }
          }
        
    }else{


        $consulta =  "UPDATE autor SET nombre = '$nuevoNombre', usuario= '$nuevoUsuario' WHERE id=$id";
        $res = $db->query($consulta);

        if(strlen($nuevaContraseña)>0){
            $contraseñaEncriptada = md5($nuevaContraseña);
            $db->query("UPDATE autor SET contraseña ='$contraseñaEncriptada'  WHERE id=$id");
        } 

        if($res){
            header("Location: ../listar-autores.php?res-edit=ok");
            exit;
        }else{
            header("Location: ../listar-autores.php?res-edit=err");
            exit;
        }

    }

    /* ----------------------------EDITAR NOTICIA------------------------------------- */
   
}if(isset($_POST["editar_not"])){

    $id = $_POST["noticia"];
    $nuevoTitulo = $_POST["titulo"];
    $nuevoFecha = $_POST["fecha"];
    $nuevoAutor = $_POST["autor"];
    $nuevoCategoria = $_POST["categoria"];


    $consulta =  "UPDATE noticia SET titulo = '$nuevoTitulo', fecha = '$nuevoFecha', id_autor = $nuevoAutor, id_categoria = $nuevoCategoria  WHERE id=$id";

    echo $consulta;
    
     $res = $db->query($consulta);

    if($res){
        header("Location: ../listar-noticias.php?res-edit=ok");
    }else{
        header("Location: ../listar-noticias.php?res-edit=err");
    }; 

}

?>