<?php
    function Conectarse(){
        if (!($link=mysqli_connect("localhost","root",""))){
            echo "Error conectando a la base de datos.";
            exit();
        }
        if (!mysqli_select_db($link,"semillas2")){
            echo "Error seleccionando la base de datos.";
            exit();
        }
        return $link;
    }
    $link=Conectarse();

    require('db_connection.php');
    $bd = Database::getInstance();

    $nombre = $_REQUEST['nombre'];
    $ciudad = $_REQUEST['ciudad'];
    $tipoDocumento = $_REQUEST['tipoDocumento'];
    $telefono = $_REQUEST['telefono'];
    $numDoc = $_REQUEST['numDoc'];
    $correo = $_REQUEST['correo'];
    $direccion = $_REQUEST['direccion'];
    $clave = $_REQUEST['clave'];

    $buscar = mysqli_query($link, "SELECT nombre from usuarios where nombre='$nombre'");

    if(mysqli_num_rows($buscar)>0){
        echo '<script type="text/javascript">
                alert("El usuario ya existe");
                window.location.replace("registrarse.php");
            </script>';
    
    }else{
        $nuevo_email = mysqli_query($link, "SELECT correo from usuarios where correo = '$correo'");
        $nuevo_documento = mysqli_query($link, "SELECT numDoc from usuarios where numDoc = '$numDoc'");

        if(mysqli_num_rows($nuevo_email)>0){
            echo '<script type="text/javascript">
                    alert("El correo ya está registrado");
                    window.location.replace("registrarse.php");
                </script>';
        
        }else if(mysqli_num_rows($nuevo_documento)>0){
            echo '<script type="text/javascript">
                    alert("El numero de documento ya existe");
                    window.location.replace("registrarse.php");
                </script>';
        }else{
            $inser = "INSERT INTO usuarios(nombre, ciudad, tipoDocumento, telefono, numDoc, correo, direccion, clave) VALUES ('$nombre', '$ciudad', '$tipoDocumento', '$telefono', '$numDoc', '$correo', '$direccion', '$clave')";
            $res = mysqli_query($link, $inser);

            if($res){
                echo '<script type="text/javascript">
                    alert("Usuario registrado correctamente");
                    window.location.replace("index.php");
                </script>';
            }else{
                echo '<script type="text/javascript">
                    alert("Algo salió mal");
                </script>';
            }
        }
    }
?>