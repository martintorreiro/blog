<?php
include "../db.php";

if(isset($_GET["editar"])){
$id=$_GET['editar'];
$consulta = "SELECT * FROM categoria WHERE id = $id";
$res = $db->query($consulta);
if($row = $res->fetch_assoc()){

?>

<div>
    <h2 class="marg-b-20">Editar categoría.</h2>

    <form class="formulario-base flex column" action="service/editar.php" method="post">

        <input type="hidden" name="categoria" value=<?php echo $row['id'] ?>>
        <div class="marg-b-20 flex  ai-center">
            <label for="categoria">Editar categoría: </label>
            <input type="text" id="categoria" name="nombre" required value="<?php echo $row['nombre'] ?>">
            <button type="button" id="editar-categoria-cancelar" class="boton">Cancelar</button>
            <button class="boton" name="editar_cat">Editar</button>
        </div>


    </form>

</div>



<?php
        }
    }

            
?>