<?php

    include "db.php";
    include "header.php";
    
    $consulta = "SELECT * FROM categoria";
    $res = $db->query($consulta);
    
    
?>

<div class="contenedor-lista w-960 centrado flex column  jc-center">

    <h1 class="marg-b-40 ta-center">Listado de Categorias</h1>

    <div>


        <ul class="listado-categorias flex column marg-b-40">

            <?php
            
            while($row = $res->fetch_assoc()){
    
            echo "<li class='flex jc-sb ai-center' >
            
                    <div class='nombre'><p>".$row['nombre']."</p></div> 

                    <div class='controles flex'>
                        <button class='boton editar' data-id=".$row['id']."><i class='fa-solid fa-pencil'></i></button>
                        <button class='boton borrar' data-id=".$row['id']."'><i class='fa-solid fa-trash-can'></i></button>
                    </div>

                </li>";
                };
            ?>
        </ul>

        <?php

            if(isset($_GET["resCat"])&&$_GET["resCat"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Creada con éxito.</p>
                    <a href='listar-categorias.php'>x</a></div>";
            }else if(isset($_GET["resCat"])&&$_GET["resCat"]=="err"){
                echo "<div class='flex respuesta err'><p '>Error al crear la categoría, comprueba que no exista una con el mimso nombre.</p>
                    <a href='listar-categorias.php'>x</a></div>";
            };

            if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Editada con éxito.</p>
                    <a href='listar-categorias.php'>x</a></div>";
               }else if(isset($_GET["res-edit"])&&$_GET["res-edit"]=="err"){
                echo "<div class='flex respuesta err'><p >Error al editar la categoría, comprueba que no exista una con el mimso nombre.</p>
                    <a href='listar-categorias.php'>x</a></div>";
               };

            if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="ok"){
                echo "<div class='flex respuesta ok'><p >Borrada con éxito.</p>
                    <a href='listar-categorias.php'>x</a></div>";
               }else if(isset($_GET["res-delete"])&&$_GET["res-delete"]=="err"){
                echo "<div class='flex respuesta err'><p >Error al borrar la categoría.</p>
                    <a href='listar-categorias.php'>x</a></div>";
               };

        ?>




        <div id="nueva-categoria">
            <button class="boton" id="enlace-categoria">
                <i class='marg-r-20 fa-solid fa-circle-plus'></i>
                <span> Añadir Categoría</span>
            </button>
        </div>


    </div>

</div>

<script>
function cargarEventos() {
    $("#enlace-categoria").click(function() {
        $("#nueva-categoria").load("ajax/nueva-categoria.php", function() {
            $("#nueva-categoria-cancelar").click(function() {
                $("#nueva-categoria").html("<button id='enlace-categoria'>\
                                <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                                <span> Añadir Categoría</span>\
                            </button>");

                cargarEventos();
            })
        })
    })

    $(".editar").click(function() {

        const idCategoria = $(this).attr("data-id")
        $("#nueva-categoria").load(`ajax/editar-categoria.php?editar=${idCategoria}`,
            function() {
                $("#editar-categoria-cancelar").click(function() {
                    $("#nueva-categoria").html("<button id='enlace-categoria' class='marg-b-40 flex'>\
                                                    <i class='marg-r-20 fa-solid fa-circle-plus'></i>\
                                                    <span> Añadir Categoria</span>\
                                                </button>");
                    cargarEventos();
                })
            })
        return false;
    })


}

cargarEventos();
</script>

<?php
    
    include "footer.php";

?>