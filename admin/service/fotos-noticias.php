<?php

include "../db.php";

$idNoticia = $_GET["idNoticia"];

$consulta = "SELECT * FROM fotos WHERE id_noticia = $idNoticia ORDER BY orden";

$res = $db->query($consulta);

$cadena = "";
while($row = $res->fetch_assoc()){

    $cadena .= "<li>
            <img src='../fotos-noticias/".$row["foto"]."' alt='foto noticia'>
            <button class='borrar-foto boton' data-id='".$row["id"]."' data-foto='".$row["foto"]."'>x</button>
        </li>";
};

echo $cadena
?>