<?php 
session_start(); 
//error_reporting(0);
$session=null;
$email=null;
if (isset($_SESSION['usuario'])) {
$session = $_SESSION['usuario'];
    $email=$_SESSION['email'];
}else{
    header("location:../index.php");
        die();
}
    
include 'op/conexion.php';
include 'op/carrito_op.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $session?></title>
	<meta charset="utf-8"/>
        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="../css/perfil/header.css"/>
        <link rel="stylesheet" type="text/css" href="../css/icons.css"/>
        <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
        <link rel="stylesheet" type="text/css" href="../css/perfil/footer.css"/>
        <link rel = "stylesheet" href = "../css/perfil/redes_sociales.css"/>
        <link rel="stylesheet" type="text/css" href="../css/perfil.css">
        <!-- fin estilos -->
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
        <header>
            <h1>
                <?php echo $session?>
            </h1>
            <p>
                <?php echo $email?>
            </p>
        </header>
        

        
        <!-- inicio contenido-->
<div class="row">
  <div class="side">
  	<div class="imgcontenedor">
  		<img src="../img/user/avatar/img_user2.png" alt="avatar" class="avatar">
  	</div>
      <h2 class="nomus"><?php echo $session?></h2>
      <div class="menu_left">
  <a class="tablinks" onclick="mostrar_contenido(event, 'mid')" id="defaultOpen">Mis datos</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mip')">Mis pedidos</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mic')">Mis compras</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'mep')">Metodos de pago</a>
  <a class="tablinks" onclick="mostrar_contenido(event, 'cec')">Cerrar sesión</a>
</div>
  </div>
  <div class="main">
  
  <div id="mid" class="tabcontent">
           <h2>Mis datos</h2>
        <h5>Informacion personal</h5>
        <!-- info -->
        <div class="fakeimg" style="height:200px;">//Datos</div>
        <p>Mantenimiento..</p>
        <p>Un poco de texto.</p>

        <!-- fin info-->
  </div>


  <div id="mip" class="tabcontent">
           <h2>Mis pedidos</h2>
        <h5>Pedidos recientes</h5>
        <!-- info -->
         <div class="fakeimg" style="height:200px;">//Datos</div>
        <p>Mantenimiento..</p>
        <p>Un poco de texto.</p>

        <!-- fin info-->
  </div>


  </div>
  <script>
function mostrar_contenido(evt, contenido) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(contenido).style.display = "block";
    evt.currentTarget.className += " active";
}

//Obtener el elemento con id = "defaultOpen" y hacer clic en él
document.getElementById("defaultOpen").click();
</script> 
</div>
        <!-- fin contenido-->
        <footer>
            <div class="columna">
                <div class="fila">
                    <div class="columna">
                        <h5>
                            Información
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Sobre nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        codigos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Legal
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="terms-and-conditions-of-use.html">
                                        Términos y condiciones de uso
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">
                                        Política de privacidad
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Información de Copyright
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Ayuda
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Soporte
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Contáctanos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna">
                        <h5>
                            Equipo
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="#!">
                                        Ruiz Pacheco Jesús Alberto
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Cabrera Bravo Victor Manuel
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Jose Ramon Hernandez Padilla
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Cabrera Torres Moises Alexis
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="columna social">
                        <h5>
                            Redes Sociales
                        </h5>
                        <div class="lista1">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/glitchord/" target="_blank" class="icon-facebook">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/glitchord/" target="_blank" class="icon-twitter">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/glitchord/" target="_blank" class="icon-instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" target="_blank" class="icon-spotify">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" target="_blank" class="icon-soundcloud">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fila">
                    <h6>
                        © 2018, Glitchord Records S.L. Copyright.
                    </h6>
                </div>
            </div>
        </footer>
    </body>
</html>
