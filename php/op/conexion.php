<?php
$server="localhost";
$username="root";
$password="";
$db="carritocompras";
  $mysql =new mysqli($server,$username,$password,$db);
  if($mysql->connect_error)
        dile("Problemas con la conexion a a base de datos");
?>