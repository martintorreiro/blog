<?php
include "../db.php";

$categorias = $db->query("SELECT * FROM categoria");
$autores = $db->query("SELECT * FROM autor");
?>

<div id="crear-noticia-form" class="formulario_estandar">
    <div class="cabecera">
        <h2>Crear nueva noticia</h2>
    </div>
    <form action="service/guardar.php" method="post" enctype="multipart/form-data">
        <div class="form_body">
            <div class="form_group">
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" maxlength="100" required placeholder="Categoría...">
            </div>

            <div class="form_group">
                <label for="intro">Intro: </label>
                <textarea name="intro" id="intro" required></textarea>
            </div>

            <div class="form_group">
                <label for="Texto">Texto: </label>
                <textarea name="Texto" id="Texto" required></textarea>
            </div class="form_group">

            <div class="form_group">
                <label for="imagen">Seleccionar imagen principal: </label>
                <input type="file" id="imagen" name="imagen" required accept=".jpg, .jpeg, .png">
            </div>

            <div class="form_group">
                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha" name="fecha" required>
            </div>

            <div class="form_group">
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

            <div class="form_group">
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

        </div>

        <div class="controls">
            <button class="cancelar" id="crear-noticia-cancelar">Cancelar</button>
            <button name="guardar_not">Enviar</button>
        </div>


    </form>

</div>