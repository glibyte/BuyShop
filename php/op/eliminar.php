<?php
session_start();
   $arreglo=$_SESSION['carrito'];
   for ($i=0; $i < count($arreglo); $i++) { 
   	   if ($arreglo[$i]['id']!=$_POST['id']) {
   	   	  $datosNuevos[]=array(
   	   	  	'id'=>$arreglo[$i]['id'],
   	   	  	'nombre'=>$arreglo[$i]['nombre'],
   	   	  	'precio'=>$arreglo[$i]['precio'],
   	   	  	'imagen'=>$arreglo[$i]['imagen'],
   	   	  	'cantidad'=>$arreglo[$i]['cantidad']  
   	   	  );
   	   }

   }
   if (isset($datosNuevos)) {
   	$_SESSION['carrito']=$datosNuevos;
   	echo '0';
   }else{
   	unset($_SESSION['carrito']);
   	echo '0';
   }
?>