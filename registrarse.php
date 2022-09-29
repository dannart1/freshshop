<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/registrar.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
        <h2>REGISTRO</h2>
        <form class="formulario" id="formulario"> 
            <!-- Nombre completo -->
            <div class="grupo_nombre" id="grupo_nombre">
                <label for="nombre_label" id="nombre_label">Nombre completo * </label>
                <div class="input">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" autocomplete="off" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Nombre incorrecto.</p>
            </div>

            <!-- Ciudad de residencia -->
            <div class="grupo_ciudad" id="grupo_ciudad">
                <label for="ciudad_label" id="ciudad_label">Ciudad de residencia *</label>
                <div class="input">
                    <input type="text" id="ciudad" name="ciudad" placeholder="Ingrese su ciudad" autocomplete="off">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Ciudad incorrecta.</p>
            </div>

            <!-- Tipo de documento -->
            <div class="grupo_tipoDoc" id="grupo_tipoDoc">
                <label for="tipoDoc_label" id="tipoDoc_label"> Tipo de documento * </label>
                    <div class="input">
                        <select class="tipoDocumento" id="tipoDocumento" name="tipoDocumento" required>
                            <option value="0" disabled selected>- Seleccionar -</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                            <option value="Cédula extranjera">Cédula extranjera</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                </label>
            </div>

            <!-- Telefono -->
            <div class="grupo_telefono" id="grupo_telefono">
                <label for="telefono_label" id="telefono_label">Télefono *</label>
                <div class="input">
                    <input type="tel" id="telefono" name="telefono" placeholder="Ingrese su número telefonico" autocomplete="off" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El minimo del telefono es 7 y el maximo son 10 dígitos.</p>
            </div>

            <!-- Numero de documento -->
            <div class="grupo_numDoc" id="grupo_numDoc">
                <label for="numDoc_label" id="numDoc_label">Número de documento *</label>
                <div class="input">
                    <input id="numDoc" class="numDoc" type="number" name="numDoc"  placeholder="Ingrese su número de documento" autocomplete="off" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El minimo del documento es 7 y el maximo son 12 dígitos.</p>
            </div>

            <!-- Correo -->
            <div class="grupo_correo" id="grupo_correo">
                <label for="correo_label" id="correo_label">Correo electrónico *</label>
                <div class="input">
                    <input type="text" id="correo" name="correo" placeholder="Ingrese su correo" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Ingrese un correo valido.</p>
            </div>

            <!-- Direccion -->
            <div class="grupo_direccion" id="grupo_direccion">
                <label for="direccion_label" id="direccion_label">Dirección de residencia *</label>
                <div class="input">
                    <input class="direccion" id="direccion" name="direccion" placeholder="Ingrese su dirección" autocomplete="off" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Solo letras y números.</p>
            </div>

            <!-- Clave -->
            <div class="grupo_clave" id="grupo_clave">
                <label for="clave_label" id="clave_label">Clave *</label>
                <div class="input">
                    <input type="password" id="clave" name="clave" placeholder="Ingrese su clave" autocomplete="off" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
            </div>
            <div class="btn-enviar">
                <button type="submit" name="btn" class="btn">Validar</button>
            </div>
        </form>
        <hr>
    </main>
    <br>
</body>
<script src="registrovalida.js"></script>
</html>


