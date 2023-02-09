<?php
    include "../db.php";
    if(isset($_GET["editar"])){
        $id=$_GET['editar'];
        $consulta = "SELECT * FROM autor WHERE id = $id";
        $res = $db->query($consulta);
        if($row = $res->fetch_assoc()){
?>


<div>
    <h2 class="marg-b-20">Editar autor.</h2>

    <form class="formulario-base flex column" action="service/editar.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="autor" value=<?php echo $row['id'] ?>>
        <div class="marg-b-20 flex column jc-start ai-start ">
            <div class="marg-b-20">
                <label for="categoria">Nombre del autor: </label>
                <input type="text" id="categoria" name="nombre" maxlength="100" required
                    value="<?php echo $row['nombre'] ?>">
            </div>

            <div class="marg-b-20">
                <label for="usuario">Nombre de usuario: </label>
                <input type="text" id="usuario" name="usuario" maxlength="50" required
                    value="<?php echo $row['usuario'] ?>">
            </div>

            <div class="marg-b-20">
                <label for="contraseña">Contraseña: </label>
                <input type="password" id="contraseña" name="contraseña" maxlength="50" placeholder="Nueva contraseña">
            </div>

            <div class="marg-b-20 flex contenedor-img-autor">
                <label class="flex jc-center ai-center marg-r-20" for="imagen">
                    <img src="../fotos-usuarios/<?php echo $row['foto'] ?>" alt="imagen">
                    <span>Cambiar Imagen</span>
                </label>
                <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">

            </div>

            <div class="flex ">
                <button class="boton" type="button" id="editar-autor-cancelar">Cancelar</button>
                <button class="boton" name="editar_aut">Editar</button>
            </div>
        </div>


    </form>

</div>


<script>


</script>

<?php
        }
    }

            
?>