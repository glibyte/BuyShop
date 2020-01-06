<?php
	include'conexion.php';
	if(!isset($_POST['nom_pro']) &&  !isset($_POST['desc_pro']) && !isset($_POST['pre_pro'])){
		header("Location: panelcontrol.php");
	}else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			$imagen="";
			$random=rand(1,999999);
			if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))){
				//Verificamos que sea una imagen
		  	if ($_FILES["file"]["error"] > 0){
		  		//verificamos que venga algo en el input file
		    	echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
		    }else{
		    	//subimos la imagen

		    	$imagen= $random.'_'.$_FILES["file"]["name"];
		    	if(file_exists("../../img/p/".$random.'_'.$_FILES["file"]["name"])){
		      		echo $_FILES["file"]["name"] . " Ya existe. ";
		      	}else{
		      		move_uploaded_file($_FILES["file"]["tmp_name"],
		      		"../../img/p/" .$random.'_'.$_FILES["file"]["name"]);
		      		$producto=$_POST['nom_pro'];
					$descripcion=$_POST['desc_pro'];
					$precio=$_POST['pre_pro'];
					$Sql="insert into productos (nombre,descripcion,imagen,precio) values(
							'".$producto."',
							'".$descripcion."',
							'".$imagen."',
							'".$precio."')";
					$mysql->query($Sql)
					or die ($mysql-> error);
		            $mysql ->close();
					header ("Location: panelcontrol.php");
		      }
		    }
		  }else{
		  echo "Formato no soportado";
		  }

		
	}
?>
