<?php 
session_start(); 
$uname=null;
if (isset($_SESSION['usuario'])) {
$uname = $_SESSION['usuario'];
}
	include("op/conexion.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	              $direccion = $_POST['address'];
	              $ciudad = $_POST['city'];
	              $estado = $_POST['state'];
	              $cp = $_POST['zip'];
	             // $uname = $_POST['firstname'];

 	                  if ($mysql-> connect_error){ 
	                     	die("Se perdio la conexion, vuelve a inetntarlo");
	                                      	//error
	         		      }else{
	         		      	//primero capturo el id del usuario actual
	         		      	$resultado=$mysql->query("select id from usuarios where uname='".$uname."';")
		                    or die ($mysql-> error);

		                    //con este while capturo solo el di
								while ($rows=$resultado->fetch_array()) {
									$idn = $rows[0];
                   					 }

                   			//insertamos la direccion al usuario actual
                   			$mysql->query("insert into direcciones (direccion, ciudad, estado, cp, id_user) values ('".$direccion."','".$ciudad."','".$estado."','".$cp."','".$idn."')")
		                    or die ($mysql-> error);
		                    
		                    $mysql ->close();
		                    
		                      //listo
		                    header("location:pagar.php");
		                   
                            
		                }
        

}
?>