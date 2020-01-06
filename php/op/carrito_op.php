<?php
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
                $arreglo=$_SESSION['carrito'];
                $encontro=false;
                $numero=0;
                for ($i=0; $i <count($arreglo) ; $i++) { 
                    if ($arreglo[$i]['id']==$_GET['id']) {
                        $encontro=true;
                        $numero=$i;
                    }
                }
                if ($encontro==true) {
                    $arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
                    $_SESSION['carrito']=$arreglo;
                }else{
                    $nombre="";
                    $precio=0;
                    $imagen="";
                    $re=$mysql->query("select * from productos where id=".$_GET['id'])or die($mysql->error());
                    while ($f=$re->fetch_array()) {
                        $nombre=$f['nombre'];
                        $precio=$f['precio'];
                        $imagen=$f['imagen'];
                    }
                    $datosNew=array('id'=>$_GET['id'],
                                     'nombre'=>$nombre,
                                      'precio'=>$precio,
                                      'imagen'=>$imagen,
                                      'cantidad'=>1);
                    array_push($arreglo, $datosNew);
                    $_SESSION['carrito']=$arreglo;
                }
    }
}else{
    if (isset($_GET['id'])) {
        $nombre="";
        $precio=0;
        $imagen="";
        $re=$mysql->query("select * from productos where id=".$_GET['id'])or die($mysql->error());
        while ($f=$re->fetch_array()) {
            $nombre=$f['nombre'];
            $precio=$f['precio'];
            $imagen=$f['imagen'];
        }
        $arreglo[]=array('id'=>$_GET['id'],
                         'nombre'=>$nombre,
                          'precio'=>$precio,
                          'imagen'=>$imagen,
                          'cantidad'=>1);
        $_SESSION['carrito']=$arreglo;
    }
}
?>