<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <div class="w-960 centrado">
        <div class="centrado formulario_estandar marg-t-40">
            <div class="cabecera">
                <h2>Login</h2>
            </div>
            <form action="acceso_usuarios.php" method="post">
                <div class="form_body">
                    <div class="form_group">
                        <label for="usuario"> Usuario</label> <input id="usuario" type="text" name="usuario">
                    </div>
                    <div class="form_group">
                        <label for="clave"> Clave</label> <input id="clave" type="password" name="clave">
                    </div>
                </div>
                <div class="controls"><button>Acceder</button></div>
            </form>
        </div>
    </div>

</body>

</html>