<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/registrar.css">
</head>
<header class="header">
    <div class="header-content">
        <div class="logo">
            <a href="index.php"><img class="izquierda" src="images/logo.png" alt="logo"></a>
        </div>
    </div>
</header>
<body>
    <main>
        <br>
        <div class="preview" id="preview"></div>
        <br>
        <br>
        <h2>INICIAR SESIÓN</h2>
        <form action="sesion.php" class="formulario" id="formulario" method='post'>
            <!-- Correo -->
            <div class="grupo_correo">
                <label for="correo_label" id="correo_label">Correo electrónico *</label>
                <div class="input">
                    <input type="text" name="correo" id="correo" placeholder="Ingrese su correo" required>
                </div>
            </div>

            <!-- Clave -->
            <div class="grupo_clave">
                <label for="clave_label" id="clave_label">Clave *</label>
                <div class="input">
                    <input type="password" name="clave" id="clave" placeholder="Ingrese su clave" autocomplete="off">
                </div>
            </div>
            <div class="btn-enviar">
                <button type="submit" class="btn" >Validar</button>
            </div>
        </form>
        <hr>       
    </main>
</body>
</html>