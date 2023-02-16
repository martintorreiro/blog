<?php
include "db.php";
include "header.php";
?>

<section class="home ">
    <div class="nav_home w-960 centrado">
        <a href="listar-categorias.php">
            <div>
                <i class="fa-solid fa-tags"></i>
                <span>Categorias</span>
            </div>
        </a>
        <a href="listar-autores.php">
            <div>
                <i class="fa-solid fa-users"></i>
                <span>Autores</span>
            </div>
        </a>
        <a href="listar-noticias.php">
            <div>
                <i class="fa-regular fa-newspaper"></i>
                <span>Noticias</span>
            </div>
        </a>
    </div>
</section>
<?php
include "footer.php";
?>