<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Administracion</title>
</head>

<body>

    <header class="w-960 centrado flex jc-sb">
        <div class="logo">
            <img src='../images/logo.png'>
        </div>

        <nav class="flex jc-center ai-center">
            <div class="flex">
                <ul class="flex">
                    <li class="marg-r-20"><a href="index.php">Inicio</a></li>
                    <li class="marg-r-20"><a href="listar-categorias.php">Categorías</a></li>
                    <li class="marg-r-20"><a href="listar-autores.php">Autores</a></li>
                    <li class="marg-r-20"><a href="listar-noticias.php">Noticias</a></li>
                </ul>
                <span>Hola <?php echo $_SESSION['nombre_autor']?> <a href='logout.php'>Salir</a></span>
            </div>
        </nav>
    </header>