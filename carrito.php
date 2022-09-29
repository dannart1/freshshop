<?php
    session_start();
    include './php/conexion.php';
    if(isset($_SESSION['semillas2'])){
        //si existe buscamos si ya estaba agregado el producto
        if(isset($_GET['id'])){
            $arreglo = $_SESSION['semillas2'];
            $encontro = false;
            $numero = 0;
            for($i=0;$i<count($arreglo);$i++){
              if($arreglo[$i]['Id'] == $_GET['id']){
                $encontro=true;
                $numero=$i;
              }
            }
            if($encontro == true){
              $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
              $_SESSION['semillas2']=$arreglo;
            }else{
              //no estaba el registro
              $descripcion = "";
              $valor = "";
              $img = "";
              $res = $conexion->query('select * from productospromo where id='.$_GET['id'])or die($conexion->error);
              $fila = mysqli_fetch_row($res);
              $descripcion = $fila[1];
              $valor = $fila[5];
              $img = $fila[3];
              $arregloNuevo = array(
                  'Id'=> $_GET['id'],
                  'Descripcion' => $descripcion,
                  'Imagen' => $img,
                  'Valor' => $valor,
                  'Cantidad' => 1
              );
              array_push($arreglo, $arregloNuevo);
              $_SESSION['semillas2'] = $arreglo;
            }
        }
    }else{
        //creamos la variable de sesion
        if(isset($_GET['id'])){
            $descripcion = "";
            $valor = "";
            $img = "";
            $res = $conexion->query('select * from productospromo where id='.$_GET['id'])or die($conexion->error);
            $fila = mysqli_fetch_row($res);
            $descripcion = $fila[1];
            $valor = $fila[5];
            $img = $fila[3];
            $arreglo[] = array(
                'Id'=> $_GET['id'],
                'Descripcion' => $descripcion,
                'Imagen' => $img,
                'Valor' => $valor,
                'Cantidad' => 1
            );
            $_SESSION['semillas2']=$arreglo;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
  <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="indexSesion.php">MI TIENDA</a> 
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Descripción</th>
                    <th class="product-price">Valor</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_SESSION['semillas2'])){
                        $arregloSemillas = $_SESSION['semillas2'];
                        for($i=0;$i<count($arregloSemillas);$i++){       
                ?>   
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $arregloSemillas[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloSemillas[$i]['Descripcion']; ?></h2>
                    </td>
                    <td>$<?php echo $arregloSemillas[$i]['Valor']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <input type="text" id="cantidad2" name="cantidad2" class="form-control text-center txtCantidad" 
                          data-valor="<?php echo $arregloSemillas[$i]['Valor']; ?>"
                          data-id="<?php echo $arregloSemillas[$i]['Id']; ?>"
                          value="<?php echo htmlspecialchars($_POST['cantidad2']); ?>" aria-label="Example text with button addon" aria-describedby="button-addon1" >
                        </div>
                    </td>
                    <?php echo $canti = $_POST['cantidad2']; ?>
                    <td class="val<?php echo $canti; ?>">
                    $<?php
                    echo $arregloSemillas[$i]['Valor'] * $canti; ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arregloSemillas[$i]['Id']; ?>">X</a></td>
                  </tr>
                <?php } } ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <button href="indexSesion.php" onclick="window.location='indexSesion.php'" class="btn btn-outline-primary btn-sm btn-block">Continuar comprando</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='metododepago.php'">Realizar pago</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function(){
      $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);
        $.ajax({
          method:'POST',
          url:'./php/eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
          boton.parent('td').parent('tr').remove();
        });
      });
      $(".txtCantidad").keyup(function(){
        var cantidad = $(this).val();
        var valor = $(this).data('valor');
        var id = $(this).data('id');
        var mult = parseFloat(cantidad)* parseFloat(valor);
        $(".val"+id).text(mult);
      });
    });
  </script>

  </body>
</html>