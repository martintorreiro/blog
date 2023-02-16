<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Crear nueva categoría</h2>
    </div>
    <form action="service/guardar.php" method="post">
        <div class="form_body">
            <div class="form_group">
                <label for="categoria">Nombra la nueva categoría: </label>
                <input type="text" id="categoria" name="categoria" maxlength="100" required placeholder="Categoría...">
            </div>
        </div>
        <div class="controls">
            <button type="button" class="cancelar" id="nueva-categoria-cancelar">Cancelar</button>
            <button name="guardar_cat">Enviar</button>
        </div>


    </form>

</div>