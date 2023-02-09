<div>
    <h2 class="marg-b-20">Crear nueva categoría.</h2>
    <form class="formulario-base flex column" action="service/guardar.php" method="post">
        <div class="marg-b-20 flex jc-start ai-center">
            <label for="categoria">Nombra la nueva categoría: </label>
            <input type="text" id="categoria" name="categoria" maxlength="100" required placeholder="Categoría...">

            <button type="button" class="boton" id="nueva-categoria-cancelar">Cancelar</button>
            <button class="boton" name="guardar_cat">Enviar</button>
        </div>

    </form>

</div>