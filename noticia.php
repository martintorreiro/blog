<?php

include "db.php";

$idNoticia =  $_GET['noticia'];



$result = $db->query("SELECT n.*, au.nombre AS autor, au.foto AS avatar,cat.id AS id_categoria, cat.nombre AS categoria, COUNT(com.id) AS comentarios FROM noticia n 
                                LEFT JOIN autor au ON au.id = n.id_autor 
                                LEFT JOIN categoria cat ON cat.id = n.id_categoria
                                LEFT JOIN comentario com ON n.id = com.id_noticia 
                                WHERE n.id = $idNoticia
                                GROUP BY n.id
                               ");


include "header.php";
if ($row = $result->fetch_assoc()){
?>

<article>
    <div class="w-960 centrado marg-b-40 contenedor-main">


        <div class="flex ai-center font-s-14 cabecera-noticia marg-b-20">
            <img class="avatar_img" src="fotos-usuarios/<?php echo $row["avatar"] ?>" alt="foto avatar">
            <span><?php echo $row["autor"] ?></span>
            <span><?php echo $row["fecha"] ?></span>
        </div>

        <div class="titulo-noticia marg-b-20">

            <h2 class="font-s-28 mayu"><?php echo $row["titulo"] ?></h2>

        </div>

        <div class="intro-noticia marg-b-40">
            <p class="font-s-28"><?php echo $row["intro"] ?></p>
        </div>


        <div class="foto-principal-noticia marg-b-20">

            <img src="fotos-noticias/<?php echo $row["foto"] ?>" alt="foto de noticia">

        </div>

        <div class="listado-fotos marg-b-40">
            <ul class="flex jc-start">

                <?php
            
                    $resultFotos = $db->query("SELECT * FROM fotos WHERE fotos.id_noticia = $idNoticia ORDER BY fotos.orden");

                    while($rowFoto = $resultFotos->fetch_assoc()){

                ?>

                <li class="marg-r-10">

                    <a href="fotos-noticias/<?php echo $rowFoto["foto"]?>" data-lightbox='roadtrip' class='m-25'>
                        <img src="fotos-noticias/<?php echo $rowFoto["foto"]?>" alt="imagen del blog">
                    </a>

                </li>

                <?php
            
                    }

                ?>

            </ul>
        </div>



        <div class="texto-noticia marg-b-40">

            <p class="font-s-18"><?php echo $row["texto"] ?></p>

        </div>

        <div class="enlaces-redes marg-b-20 flex jc-sb ai-center ">


            <div class="social-footer  flex jc-sb ai-center">
                <ul class="flex">
                    <li><i class="fa-brands fa-facebook"></i></li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-pinterest"></i></li>
                    <li><i class="fa-brands fa-square-instagram"></i></li>
                </ul>
            </div>

            <a class="mayu-1"
                href="index.php?categoria=<?php echo $row["id_categoria"] ?>"><?php echo $row["categoria"] ?></a>


        </div>

        <div class="flex jc-sb">
            <div>
                <span class="font-s-14 marg-r-10"><?php echo $row["visualizaciones"] ?> Visualizaciones</span>
                <span class="font-s-14 "><?php echo $row["comentarios"] ?> Comentarios</span>
            </div>

            <div>
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>



    </div>

    <div class="comentarios w-960 centrado marg-b-40">

        <h3 class="marg-b-20">Comentarios</h3>

        <ul class="contenedor-comentarios marg-b-40">

            <?php

            $resultComentarios = $db->query("SELECT * FROM comentario WHERE comentario.id_noticia = $idNoticia");

            while($rowComentarios = $resultComentarios->fetch_assoc()){

            ?>

            <li class="marg-b-20">
                <div class="flex">

                    <span class="marg-r-10"><?php echo $rowComentarios["autor"] ?></span>

                    <span><?php echo $rowComentarios["fecha"] ?></span>

                </div>

                <p><?php echo $rowComentarios["comentario"] ?></p>

            </li>


            <?php

                }

            ?>
        </ul>

        <form class="form-comentarios flex column" action="manejador-comentario.php?noticia=<?php echo $idNoticia ?>"
            method="POST">

            <input name="nombre" class="marg-b-20" type="text" placeholder="Inserte su nombre">

            <textarea name="mensaje" class="marg-b-20 " placeholder="Escriba un comentario..."></textarea>

            <div class="flex jc-end">

                <button class="marg-r-10 cancelar" type="button">Cancelar</button>
                <button class="enviar" name="enviar">Publicar</button>

            </div>



        </form>


    </div>


</article>





<?php
}
include "footer.php";

?>