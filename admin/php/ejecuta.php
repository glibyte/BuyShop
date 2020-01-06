<?php 
	include "conexion.php";
	if($_POST['Caso']=="Eliminar"){
		$mysql->query("delete from productos where id=".$_POST['Id']);
		unlink("../../img/p/".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){
		$mysql->query("update productos set nombre='".$_POST['Nombre']."' where id=".$_POST['Id']);
		$mysql->query("update productos set descripcion='".$_POST['Descripcion']."' where id=".$_POST['Id']);
		$mysql->query("update productos set precio='".$_POST['Precio']."' where id=".$_POST['Id']);
		echo 'El producto se ha modificado';
	}

?>