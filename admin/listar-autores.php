<?php

    include "db.php";
    include "header.php";
    
    $consulta = "SELECT * FROM autor";
    $res = $db->query($consulta);
    
    
?>

<div class="contenedor-lista w-960 centrado flex column  jc-center">

    <h1 class="marg-b-40 ta-center">Listado de Autores</h1>

    <div>


        <ul class="listado-categorias flex column marg-b-40">

            <?php
            
            while($row = $res->fetch_assoc()){
    
            echo "<li class='flex jc-sb ai-center' >
            
                    <div class='flex jc-start ai-center listado-datos'>
                        <img class='marg-r-20' src='../fotos-usuarios/".$row['foto']."' />
                        <p class='marg-r-20'>".$row['nombre']."</p> 
                    </div> 

                    <div class='controles flex'>
                        <button class='editar boton' data-id=".$row['id']."><i class='fa-solid fa-pencil'></i></button>
                        <a class='boton' href='service/borrar.php?autor=".$row['id']."'><i class='fa-solid fa-trash-can'></i></a>
                    </div>

                </li>";


                };
            ?>

        </ul>


        <!------------------------------GESTION RESPUESTAS------------------------------>
        <?php

            if(isset($_GET["resCat"])&&$_GET["resCat"]=="ok"){
                echo "<div class='flex marg-b-40 respuesta ok'><p class='marg-r-20'>Creado con éxito.</p>
                    <a href='listar-autores.php'>x</a></div>";
            }else if(isset($_GET["resCat"])&&$_GET["resCat"]=="err"){
                echo "<div class='flex marg-b-40 respuesta err'><p class='marg-r-20'>Error al crear el autor, comprueba que no exista uno con el mimso nombre de usuario.</p>
                    <a href='listar-autores.php'>x</a></div>";
            };

            if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="ok"){
                echo "<div class='flex marg-b-40 respuesta ok'><p class='marg-r-20'>Editado con éxito.</p>
                    <a href='listar-autores.php'>x</a></div>";
               }else if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="err"){
                echo "<div class='flex marg-b-40 respuesta err'><p class='marg-r-20'>Error al editar el autor, comprueba que no exista uno con el mimso nombre.</p>
                    <a href='listar-autores.php'>x</a></div>";
               }

            if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="ok"){
                echo "<div class='flex marg-b-40 respuesta ok'><p class='marg-r-20'>Borrado con éxito.</p>
                    <a href='listar-autores.php'>x</a></div>";
               }else if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="err"){
                echo "<div class='flex marg-b-40 respuesta err'><p class='marg-r-20'>Error al borrar el autor.</p>
                    <a href='listar-autores.php'>x</a></div>";
               }
        ?>


        <div id="nuevo-autor">
            <button id="enlace-autor" class="boton">
                <i class='marg-r-20 fa-solid fa-circle-plus'></i>
                <span> Añadir Autor</span>
            </button>
        </div>


        <script>
        function cargarEventos() {
            $("#enlace-autor").click(function() {
                $("#nuevo-autor").load("ajax/nuevo-autor.php", function() {
                    $("#nuevo-autor-cancelar").click(function() {
                        $("#nuevo-autor").html("<button class='boton' id='enlace-autor'>\
                                        <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                                        <span> Añadir Autor</span>\
                                    </button>");

                        cargarEventos();
                    })
                })
            })

            $(".editar").click(function() {

                const idAutor = $(this).attr("data-id")
                $("#nuevo-autor").load(`ajax/editar-autor.php?editar=${idAutor}`,
                    function() {
                        $("#editar-autor-cancelar").click(function() {
                            $("#nuevo-autor").html("<button class='boton' id='enlace-autor'>\
                                        <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                                        <span> Añadir Autor</span>\
                                    </button>");
                            cargarEventos();
                        })
                    })
                return false;
            })
        }

        cargarEventos();
        </script>


    </div>

</div>




<?php
    
    include "footer.php";

?>