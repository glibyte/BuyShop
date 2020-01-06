<?php
session_start();
include"conexion.php";
  $arreglo=$_SESSION['carrito'];
  $numventa=0;
  $re=$mysql->query("select * from compras order by numeroVenta DESC limit 1") or die($mysql-> error);
  while ($f=$re->fetch_array()) {
                        $numventa=$f['numeroVenta'];
                    }
                    if ($numventa==0) {
                    	$numventa=1;
                    }else{
                    	$numventa++;
                    }
                    for ($i=0; $i <count($arreglo) ; $i++) { 
                    	$mysql->query("insert into compras (numeroVenta, imagen, nombre, precio, cantidad, subtotal) values (
                    		".$numventa.",
                    		'".$arreglo[$i]['imagen']."',
                    		'".$arreglo[$i]['nombre']."',
                    		".$arreglo[$i]['precio'].",
                    		".$arreglo[$i]['cantidad'].",
                    		".$arreglo[$i]['precio']*$arreglo[$i]['cantidad']."
                    	)")or die ($mysql-> error);
                    }

 //mandar compra por correo
                    //se crea la tabla
        $total=0;
        $tabla='<table border="1">
            <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            </tr>';
        for($i=0;$i<count($arreglo);$i++){
            $tabla=$tabla.'<tr>
                <td>'.$arreglo[$i]['nombre'].'</td>
                <td>'.$arreglo[$i]['cantidad'].'</td>
                <td>'.$arreglo[$i]['precio'].'</td>
                <td>'.$arreglo[$i]['cantidad']*$arreglo[$i]['precio'].'</td>
                </tr>
            ';
            $total=$total+($arreglo[$i]['cantidad']*$arreglo[$i]['precio']);
        }
        $tabla=$tabla.'</table>';
        //echo $tabla;

                 //se crean los datos para el correo
        $nombre="Pacheco";
        $fecha=date("d-m-Y");
        $hora=date("H:i:s");
        $asunto="Compra en Aliencix.com";
        $desde="www.aliencix.com";
        $correo="garpyng@gmail.com";
        $comentario='
            <div style="
                border:1px solid #d6d2d2;
                border-radius:5px;
                padding:10px;
                width:800px;
                heigth:300px;
            ">
            <center>
                <img src="https://scontent.fzmm1-1.fna.fbcdn.net/v/t1.0-9/54524532_245649692901328_4405490333673062400_n.jpg?_nc_cat=108&_nc_ht=scontent.fzmm1-1.fna&oh=b9c31b45ca34f69a1b13202fdc0c4c6b&oe=5D63AD25" width="300px" heigth="250px">
                <h1>Muchas gracias por comprar en mi carrito de compras</h1>
            </center>
            <p>Hola '.$nombre.' muchas gracias por comprar aquí te mando los detalles de tu compra</p>
            <p>Lista de Artículos<br>
                '.$tabla.'
                <br>
                Total del pago es: '.$total.'

            </p>
            </div>

        ';

        echo $comentario;
        $headers="MIME-Version: 1.0\r\n";
        $headers.="Content-type: text/html; charset=utf8\r\n";
        $headers.="From: Remitente\r\n";
        mail($correo,$asunto,$comentario,$headers);

//fin de mandar compra por correo


                    //destruir la variable de sesion
                    unset($_SESSION['carrito']);
                    header("location:../carritodecompras.php?=pagado");
?>