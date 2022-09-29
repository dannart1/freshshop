  <?php
session_start();
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

  if(!isset($_POST['correo'], $_POST['clave'])){
    echo '<script type="text/javascript">
      alert("ERROR: revise la informacion");
      window.location.replace("iniciarsesion.php");
      </script>';
  }

  $correo = $_POST['correo'];
  $clave = $_POST['clave'];
  $buscar = mysqli_query($link, "SELECT numDoc from usuarios where correo='$correo' AND clave='$clave'");

  if(mysqli_num_rows($buscar)>0){
      $row = $buscar->fetch_assoc();
      $_SESSION['docUsuario'] = $row["numDoc"];
      header("Location: indexSesion.php");
  }else{
    echo '<script type="text/javascript">
    alert("Datos NO validos, verifique información");
    window.location.replace("iniciarsesion.php");
    </script>';
  }
?>