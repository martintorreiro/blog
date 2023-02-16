<?php
    include "../db.php";
    if(isset($_GET["editar"])){
        $id=$_GET['editar'];
        $consulta = "SELECT * FROM autor WHERE id = $id";
        $res = $db->query($consulta);
        if($row = $res->fetch_assoc()){
?>


<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Editar autor</h2>
    </div>


    <form class="formulario-base flex column" action="service/editar.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="autor" value=<?php echo $row['id'] ?>>
        <div class="form_body">
            <div class="form_group">
                <label for="categoria">Nombre del autor: </label>
                <input type="text" id="categoria" name="nombre" maxlength="100" required
                    value="<?php echo $row['nombre'] ?>">
            </div>

            <div class="form_group">
                <label for="usuario">Nombre de usuario: </label>
                <input type="text" id="usuario" name="usuario" maxlength="50" required
                    value="<?php echo $row['usuario'] ?>">
            </div>

            <div class="form_group">
                <label for="contraseña">Contraseña: </label>
                <input type="password" id="contraseña" name="contraseña" maxlength="50" placeholder="Nueva contraseña">
            </div>

            <div class="form_group flex contenedor-img-autor">
                <label class="flex jc-center ai-center marg-r-20" for="imagen">
                    <img src="../fotos-usuarios/<?php echo $row['foto'] ?>" alt="imagen">
                    <span>Cambiar Imagen</span>
                </label>
                <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">

            </div>
        </div>

        <div class="controls">
            <button class="cancelar" type="button" id="editar-autor-cancelar">Cancelar</button>
            <button name="editar_aut">Editar</button>
        </div>



    </form>

</div>


<?php
        }
    }

            
?>