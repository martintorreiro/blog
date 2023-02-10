<?php

$idNoticia = $_POST["id"];
$fotos= $_POST["imagenes"];
echo $idNoticia;
/* $total = count($_FILES['imagenes']['name']); */

/* for( $i=0 ; $i < $total ; $i++ ) {
    
    $imagen = $_FILES['imagenes']['name'][$i];
    $tmpFilePath = $_FILES['imagenes']['tmp_name'][$i];

    if ($tmpFilePath != ""){

        $newFilePath = "../../fotos-noticias/" . $_FILES['imagenes']['name'][$i];
        
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            
            $consulta =  "INSERT INTO fotos (foto,orden,id_noticia) 
                        VALUES ('$imagen',$i+1,$idNoticia)";
            $res = $db->query($consulta);
        
            if(!$res){
                unlink($newFilePath);
            }  

        }
    }
}; */

?>