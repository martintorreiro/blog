<?php

include "../db.php";

$categorias = $db->query("SELECT * FROM categoria");
$autores = $db->query("SELECT * FROM autor");

if(isset($_GET["editar"])){
    $id=$_GET['editar'];
    $consulta = "SELECT n.*,aut.nombre AS autor, cat.nombre AS categoria FROM noticia n 
                LEFT JOIN autor aut ON n.id_autor = aut.id 
                LEFT JOIN categoria cat ON n.id_categoria = cat.id
                WHERE n.id = $id";

    $res = $db->query($consulta);

    if($row = $res->fetch_assoc()){

?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Editar Noticia</h2>
    </div>

    <form action="service/editar.php" method="post">

        <input type="hidden" name="noticia" value=<?php echo $row['id'] ?>>
        <div class="form_body">
            <div class="form_group">
                <label for="categoria">Editar titulo: </label>
                <input type="text" id="categoria" name="titulo" value="<?php echo $row['titulo'] ?>">
            </div>

            <div class="form_group">
                <label for="fecha">Editar fecha: </label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha'] ?>">
            </div>

            <div class="form_group">
                <label for="autor">Cambiar autor: </label>
                <select name="autor" id="autor">

                    <?php

                            if($autores->num_rows){
                                while($rowAutor = $autores->fetch_assoc()){
                                    
                                    if($rowAutor['id']==$row['id_autor']){
                                        echo "<option selected value='".$rowAutor['id']."'>".$rowAutor['nombre']."</option>";
                                    }else{
                                        echo "<option value='".$rowAutor['id']."'>".$rowAutor['nombre']."</option>";
                                    };
                                    

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de los autores</p>";
                            }

                        ?>

                </select>
            </div>

            <div class="form_group">
                <label for="categoria">Cambiar categoria: </label>
                <select name="categoria" id="categoria">

                    <?php

                            if($categorias->num_rows){
                                while($rowCat = $categorias->fetch_assoc()){

                                    if($rowCat['id']==$row['id_categoria']){
                                        echo "<option selected value='".$rowCat['id']."'>".$rowCat['nombre']."</option>";;
                                    }else{
                                        echo "<option value='".$rowCat['id']."'>".$rowCat['nombre']."</option>";
                                    };
                                    

                                }

                            }else{
                                echo "<p>No se han podido cargar los datos de las categorias</p>";
                            }

                        ?>

                </select>
            </div>
        </div>

        <div class="controls">
            <button id="editar-noticia-cancelar" class="cancelar">Cancelar</button>
            <button name="editar_not">Editar</button>
        </div>



    </form>
</div>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2>Imagenes Noticia</h2>
    </div>

    <ul class="listado-fotos flex jc-sb wrap" id="listado-fotos">

    </ul>

    <form action="service/guardar.php" id="formulario-fotos" method="post" enctype="multipart/form-data">
        <div class="form_body">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form_group__files">
                <label class="marg-b-20 boton" for="imagenes"><span>Seleccionar imagenes</span></label>
                <input type="file" name="imagenes[]" id="imagenes" required accept=".jpg, .jpeg, .png" multiple>
            </div>
        </div>
        <div class="controls">
            <button name="guardar-fotos">Añadir</button>
        </div>
    </form>


</div>



<script src="js/getFotosNoticias.js"></script>
<script src="js/guardarFotos.js"></script>
<script>
getFotosNoticias(<?php echo $id?>);

guardarFotos();
</script>


<?php
                }
            }
           
        ?>