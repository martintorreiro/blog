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

    $consultaFotos = "SELECT * FROM fotos WHERE id_noticia = $id ORDER BY orden";         
         
    $res = $db->query($consulta);
    $resFotos = $db->query($consultaFotos);

               

    if($row = $res->fetch_assoc()){

?>

<div>
    <h2 class="marg-b-20">Editar Noticia.</h2>

    <form class="formulario-base flex column marg-b-40" action="service/editar.php" method="post">

        <input type="hidden" name="noticia" value=<?php echo $row['id'] ?>>
        <div class="marg-b-20 flex column ai-start">
            <div class="marg-b-20">
                <label for="categoria">Editar titulo: </label>
                <input type="text" id="categoria" name="titulo" value="<?php echo $row['titulo'] ?>">
            </div>

            <div class="marg-b-20">
                <label for="fecha">Editar fecha: </label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha'] ?>">
            </div>

            <div class="marg-b-20">
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

            <div class="marg-b-20">
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

            <div class="flex">
                <button id="editar-noticia-cancelar" class="boton">Cancelar</button>
                <button class="boton" name="editar_not">Editar</button>
            </div>
        </div>


    </form>

    <div class="marg-b-40">
        <h3>Fotos</h3>
        <div class="flex ">
            <ul class="listado-fotos flex jc-sb wrap">
                <?php

                while($row = $resFotos->fetch_assoc()){
                    echo "<li>
                            <img src='../fotos-noticias/".$row["foto"]."' alt='foto noticia'>
                            <a href='service/borrar.php?id=".$row["id"]."&foto=".$row["foto"]."'>x</a>
                        </li>";
                };

            ?>
            </ul>
            <div class="añadir-foto">
                <h4 class="marg-b-40">Añadir imagenes</h4>
                <form action="service/guardar.php" id="formulario-fotos" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label class="marg-b-20 boton" for="imagenes"><span>Seleccionar imagenes</span></label>
                    <input type="file" name="imagenes[]" id="imagenes" required accept=".jpg, .jpeg, .png" multiple>
                    <button class="boton" name="guardar-fotos">Añadir</button>
                </form>
            </div>
        </div>
    </div>

</div>


<?php
                }
            }

            
        ?>