<?php
session_start();
$arreglo = $_SESSION['semillas2'];
for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['Id'] != $_POST['id']){
        $arregloNuevo[]=array(
           'Id'=>$arreglo[$i]['Id'], 
           'Descripcion'=>$arreglo[$i]['Descripcion'],
           'Valor'=>$arreglo[$i]['Valor'],
           'Imagen'=>$arreglo[$i]['Imagen'],
           'Cantidad'=>$arreglo[$i]['Cantidad'],
        );
    }
}
if(isset($arregloNuevo)){
    $_SESSION['semillas2']=$arregloNuevo;
}else{
    //quiere decir que el registro a eliminar es el unico que habia
    unset($_SESSION['semillas2']);
}
echo "Listo";
?>