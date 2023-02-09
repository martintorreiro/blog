<?php

    include "db.php";
    include "header.php";
    
    $consulta = "SELECT n.*,aut.nombre AS autor, cat.nombre AS categoria FROM noticia n 
                LEFT JOIN autor aut ON n.id_autor = aut.id 
                LEFT JOIN categoria cat ON n.id_categoria = cat.id";
    $res = $db->query($consulta);
   
?>

<script>
$(function() {
    cargarEventos();
});

function cargarEventos() {
    $("#enlace-noticia").click(function() {
        $("#nueva-noticia").load("ajax/nueva-noticia.php", function() {
            $("#crear-noticia-cancelar").click(function() {
                $("#nueva-noticia").html("<button id='enlace-noticia' class='marg-b-40 flex'>\
                        <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                        <span> Añadir Noticia</span>\
                    </button>");
                cargarEventos();
            })
        });
        return false;
    })

    $(".editar").click(function() {

        const idNoticia = $(this).attr("data-id")
        $("#nueva-noticia").load(`ajax/editar-noticia.php?editar=${idNoticia}`,
            function() {
                $("#editar-noticia-cancelar").click(function() {
                    $("#nueva-noticia").html("<button id='enlace-noticia' class='marg-b-40 flex'>\
                        <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                        <span> Añadir Noticia</span>\
                    </button>");
                    cargarEventos();
                })
            })
        return false;
    })
}
</script>
<div class="contenedor-lista w-960 centrado flex column  jc-center">

    <h1 class="marg-b-40 ta-center">Listado de Noticias</h1>

    <div>


        <ul class="listado-categorias flex column marg-b-40">

            <?php
            
            while($row = $res->fetch_assoc()){
    
            echo "<li class='flex jc-sb ai-center' >
            
                    <div class='titulo'><p>".$row['titulo']."</p></div>
                    <div class='fecha'><p>".$row['fecha']."</p></div>
                    <div class='fecha'><p>".$row['categoria']."</p></div>
                    <div class='fecha'><p>".$row['autor']."</p></div>      

                    <div class='controles flex'>
                        <button class='editar boton' data-id='".$row['id']."'><i class='fa-solid fa-pencil'></i></button>
                        <a href='service/borrar.php?noticia=".$row['id']."'><i class='fa-solid fa-trash-can'></i></a>
                    </div>

                </li>";


                };
            ?>

        </ul>


        <?php

            if(isset($_GET["resCat"])&&$_GET["resCat"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Creada con éxito.</p>
                    <a href='listar-noticias.php'>x</a></div>";
            }else if(isset($_GET["resCat"])&&$_GET["resCat"]=="err"){
                echo "<div class='flex respuesta err'><p '>Error al crear la categoría, comprueba que no exista una con el mimso nombre.</p>
                    <a href='listar-noticias.php'>x</a></div>";
            };

            if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Editada con éxito.</p>
                    <a href='listar-noticias.php'>x</a></div>";
               }else if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="err"){
                echo "<div class='flex respuesta err'><p >Error al editar la categoría, comprueba que no exista una con el mimso nombre.</p>
                    <a href='listar-noticias.php'>x</a></div>";
               }

            if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Borrada con éxito.</p>
                    <a href='listar-noticias.php'>x</a></div>";
               }else if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="err"){
                echo "<div class='flex respuesta err'><p >Error al borrar la categoría.</p>
                    <a href='listar-noticias.php'>x</a></div>";
               }



        ?>


        <div id="nueva-noticia">
            <button id='enlace-noticia' class='marg-b-40 flex boton'>
                <i class='marg-r-20 fa-solid fa-circle-plus'></i>
                <span> Añadir Noticia</span>
            </button>
        </div>


    </div>

</div>




<?php
    
    include "footer.php";

?>