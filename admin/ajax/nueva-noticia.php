<?php
include "../db.php";

$categorias = $db->query("SELECT * FROM categoria");
$autores = $db->query("SELECT * FROM autor");
?>

<div id="crear-noticia-form">
    <h2 class="marg-b-20">Crear nueva noticia.</h2>
    <form class="formulario-base form-nueva-noticia flex column" action="service/guardar.php" method="post"
        enctype="multipart/form-data">
        <div class="marg-b-20 flex column jc-start ai-start">
            <div class="marg-b-20">
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" maxlength="100" required placeholder="Categoría...">
            </div>

            <div class="marg-b-20">
                <label for="intro">Intro: </label>
                <textarea name="intro" id="intro" required></textarea>
            </div>

            <div class="marg-b-20">
                <label for="Texto">Texto: </label>
                <textarea name="Texto" id="Texto" required></textarea>
            </div class="marg-b-20">

            <div class="marg-b-20">
                <label for="imagen">Seleccionar imagen principal: </label>
                <input type="file" id="imagen" name="imagen" required accept=".jpg, .jpeg, .png">
            </div>

            <div class="marg-b-20">
                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha" name="fecha" required>
            </div>

            <div class="marg-b-20">
                <label for="autor">Autor: </label>
                <select name="autor" id="autor">

                    <?php

                            if($autores->num_rows){
                                while($rowAutor = $autores->fetch_assoc()){
                                
                                    echo "<option value='".$rowAutor['id']."'>".$rowAutor['nombre']."</option>";

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de los autores</p>";
                            }

                        ?>

                </select>
            </div>

            <div class="marg-b-20">
                <label for="categoria">Categoria: </label>
                <select name="categoria" id="categoria">

                    <?php

                            if($categorias->num_rows){
                                while($rowCat = $categorias->fetch_assoc()){
                  
                                    echo "<option value='".$rowCat['id']."'>".$rowCat['nombre']."</option>";
  
                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de las categorias</p>";
                            }

                        ?>

                </select>
            </div>



            <div class="flex">
                <button class="boton" id="crear-noticia-cancelar">Cancelar</button>
                <button class="boton" name="guardar_not">Enviar</button>
            </div>
        </div>

    </form>

</div>