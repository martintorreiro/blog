<?php

include "db.php";

include "header.php";

?>

<section class="titulo">
    <h1 class="w-960 centrado ta-center">DISEÑO <span>PARA </span>VIVIR</h1>
</section>

<section class="filtro-busqueda">
    <nav class="w-960 centrado  ">
        <a href="index.php">Todas las entradas</a>
        <?php

        $result = $db->query( "SELECT * FROM categoria");

        while($row = $result->fetch_assoc()){

          echo  "<a href='index.php?categoria=".$row["id"]."'>".$row["nombre"]."</a>";

        };

        ?>

    </nav>
</section>


<div>
    <ul class="w-960 centrado">

        <?php

        $consulta = "SELECT n.*, au.nombre AS autor, au.foto AS avatar, COUNT(com.id) AS comentarios FROM noticia n 
        LEFT JOIN autor au ON au.id = n.id_autor
        LEFT JOIN categoria cat ON cat.id = n.id_categoria 
        LEFT JOIN comentario com ON n.id = com.id_noticia 
        GROUP BY n.id";

        if(isset($_GET["categoria"])){

            $categoria = $_GET["categoria"];

            $consulta = "SELECT n.*, au.nombre AS autor, au.foto AS avatar, COUNT(com.id) AS comentarios FROM noticia n 
            LEFT JOIN autor au ON au.id = n.id_autor
            LEFT JOIN categoria cat ON cat.id = n.id_categoria 
            LEFT JOIN comentario com ON n.id = com.id_noticia 
            WHERE n.id_categoria = $categoria
            GROUP BY n.id";

        }

        $result = $db->query($consulta);

        while($row = $result->fetch_assoc()){

    ?>

        <li class="noticia flex">



            <div class="imagen-noticia">
                <a href="noticia.php?noticia=<?php echo $row["id"] ?>">
                    <img src="fotos-noticias/<?php echo $row["foto"] ?>" alt="imagen principal noticia">
                </a>
            </div>

            <div class="post-info">
                <div class="post-info_header flex font-s-12">

                    <img class="avatar_img" src="fotos-usuarios/<?php echo $row["avatar"] ?>" alt="avatar">

                    <div class="user-info flex column jc-sb">
                        <span><?php echo $row["autor"] ?></span>
                        <span><?php echo $row["fecha"] ?></span>
                    </div>

                </div>

                <div class="post-info_main">
                    <a href="noticia.php?noticia=<?php echo $row["id"] ?>">
                        <h2 class="font-s-28"><?php echo strtoupper($row["titulo"]) ?></h2>
                        <p class="font-s-16"><?php echo ucfirst($row["intro"]) ?></p>
                    </a>
                </div>

                <div class="post-info_footer font-s-12 flex ai-center">

                    <span><?php echo $row["visualizaciones"]  ?> Visualizaciones</span>
                    <span><?php echo $row["comentarios"]  ?> Comentarios</span>

                </div>

            </div>
        </li>


        <?php

        }

        ?>

    </ul>

</div>





<?php

include "footer.php";

?>