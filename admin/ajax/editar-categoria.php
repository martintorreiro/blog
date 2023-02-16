<?php
include "../db.php";

if(isset($_GET["editar"])){
$id=$_GET['editar'];
$consulta = "SELECT * FROM categoria WHERE id = $id";
$res = $db->query($consulta);
if($row = $res->fetch_assoc()){

?>

<div class="formulario_estandar">
    <div class="cabecera">
        <h2 class="marg-b-20">Editar categoría</h2>
    </div>

    <form action="service/editar.php" method="post">
        <input type="hidden" name="categoria" value=<?php echo $row['id'] ?>>
        <div class="form_body">
            <div class="form_group">
                <label for="categoria">Editar categoría: </label>
                <input type="text" id="categoria" name="nombre" required value="<?php echo $row['nombre'] ?>">
            </div>
        </div>
        <div class="controls">
            <button type="button" id="editar-categoria-cancelar" class="cancelar">Cancelar</button>
            <button name="editar_cat">Editar</button>
        </div>
    </form>
</div>



<?php
        }
    }

            
?>