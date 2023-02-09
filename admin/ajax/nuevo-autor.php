<div>
    <h2 class="marg-b-20">Crear nuevo autor.</h2>
    <form class="formulario-base flex column" id="form-crear-autor" action="service/guardar.php" method="post"
        enctype="multipart/form-data">
        <div class="marg-b-20 flex column jc-start ai-start">
            <div class="marg-b-20" id="autorDiv">
                <label for="autor">Nombre del autor: </label>
                <input type="text" id="autor" name="nombre" maxlength="100" required placeholder="Autor...">
            </div>

            <div class="marg-b-20">
                <label for="usuario">Nombre de usuario: </label>
                <input type="text" id="usuario" name="usuario" maxlength="50" required placeholder="Autor...">
            </div>

            <div class="marg-b-20">
                <label for="contraseña">Contraseña: </label>
                <input type="password" id="contraseña" name="contraseña" maxlength="50" required placeholder="Autor...">
            </div>

            <div class="marg-b-20 flex contenedor-img-autor">
                <label class="flex jc-center ai-center marg-r-20" for="imagen">
                    <img src="../fotos-usuarios/default-user.png" alt="imagen">
                    <span>Cargar Imagen (Opcional).</span>
                </label>
                <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png">

            </div>

            <div class="flex ">
                <button class="boton" id="nuevo-autor-cancelar" type="button">Cancelar</button>
                <button class="boton" name="guardar_aut">Enviar</button>
            </div>
        </div>

    </form>

</div>