<?php session_start(); 
if (isset($_SESSION['usuario'])) {
    $session = $_SESSION['usuario'];
}else{
    $session=null;
}
include 'op/conexion.php';
include 'op/carrito_op.php'
?>
<!DOCTYPE html>
<html>
<title>Aliencix</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/css_002.css">
<link rel="stylesheet" href="../css/icons.css">
<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="../css/carrito.css">
<link rel="stylesheet" href="../css/login_signup.css"/>
<link rel="stylesheet" href="../css/menu1.css"/>
<link rel="stylesheet" href="../css/glibyte_lq.css"/>

<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><p>
      <a href="../">
      <img src="../img/logo/original_200x200.png" width="120" height="120" alt="logo">
      </a>
    </p></h3>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-16 w3-wide"><img src="../img/logo/original_200x200.png" width="50" height="50" alt="logo"></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <div class="menu_gb w3-right">
      
      <?php if ( $session!=null ) { ?>
                    <a onclick="myFunction2()">
                    <?php echo $session?>
                    </a>
                    <div class="dropdown">
                    <div id="myDropdown" class="dropdown-content">
                    <!--<a href="perfil.php">Mi cuenta</a>-->
                    <a href="login/cerrar_session.php">Cerrar sesión</a>
                    </div>
                </div>
                <!-- para mostrar conetenido del boton -->
                <script type="text/javascript" src="../js/btn_usuario.js"></script>
                <!-- para mostrar conetenido del boton -->
               
                <?php } ?>
                <?php if ( $session==null ) { ?>
                    <a onclick="document.getElementById('id01').style.display='block'">
                        Inicia sesión
                    </a>
                    <a onclick="document.getElementById('id02').style.display='block'">
                        Regístrate
                    </a>
                <?php } ?>

                <!-- carrito -->
                <a class="car" href="#!">
                <i class="icon-cart"></i>
                </a>
    </div>
  </header>

  <!-- Iniciar sesión -->
        <div id="id01" class="modal">
            <form class="modal-content animate" action="login/validar_user.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="../img/user/avatar/img_user2.png" alt="Avatar" class="avatar"/>
                </div>
                <div class="container">
                    <label for="uname">
                        <b>
                            Nombre de Usuario
                        </b>
                    </label>
                    <input type="text" placeholder="Usuario" name="uname" required/>
                    <label for="psw">
                        <b>
                            Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" name="psw" required/>
                    <button type="submit" class="lore">
                        Inicia sesión
                    </button>
                    <label class="check">
                        <input type="checkbox" name="recordar1"/>
                        Recordar
                        <span class="checkmark">
                        </span>
                    </label>
                    <div class="me">
                        Aún no tienes una cuenta?
                        <a id="c1">
                            crear cuenta
                        </a>
                    </div>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                        Cancelar
                    </button>
                    <span class="psw">
                        Se te olvidó tu
                        <a href="#">
                            contraseña?
                        </a>
                    </span>
                </div>
            </form>
        </div>
        
        <!-- cambiar de ventana -->
        <script type="text/javascript" src="../js/cambiar_de_ventana1.js"></script>
        <!-- cambiar de ventana -->
        <!-- Fin Iniciar sesión -->

        <!-- Registrar -->
        <div id="id02" class="modal">
            <form class="modal-content animate" action="login/registrar.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="../img/user/avatar/img_user2.png" alt="Avatar" class="avatar"/>
                </div>
                <div class="container">
                    <label for="uname">
                        <b>
                            Nombre de Usuario
                        </b>
                    </label>
                    <input type="text" placeholder="Usuario" name="uname" required/>
                    <label for="email">
                        <b>
                            Correo
                        </b>
                    </label>
                    <input type="text" placeholder="ejemplo@gmail.com" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="verifica tu correo" required/>
                    <label for="psw">
                        <b>
                            Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" id="psw" name="psw" pattern="(?=.*\d).{8,}" title="Debe contener al menos un número y 8 o más caracteres" required/>
                    <label for="psw">
                        <b>
                            Confirmar Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" name="psw_repeat" required/>
                    <button type="submit" class="lore">
                        Regístrate
                    </button>
                    <label class="check">
                        <input type="checkbox" name="recordar2"/>
                        Recordar
                        <span class="checkmark">
                        </span>
                    </label>
                    <div class="me">
                        Ya tienes una cuenta?
                        <a id="c2">
                            Inicia sesión
                        </a>
                    </div>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">
                        Cancelar
                    </button>
                     <br>
                    <span>
                        Al crear una cuenta, usted acepta nuestros
                        <a href="privacy-policy.html">
                            Términos y Privacidad.
                        </a>
                    </span>
                </div>
                <!-- emnsaje para la contraseña -->
                <div id="message">
                    <h3>
                        La contraseña debe contener lo siguiente:
                    </h3>
                    <p id="number" class="invalid">
                        A
                        <b>
                            número
                        </b>
                    </p>
                    <p id="length" class="invalid">
                        Minimum
                        <b>
                            8 caracteres
                        </b>
                    </p>
                </div>
                <!-- script para registrar -->
                <script type="text/javascript" src="../js/registrar_email_psw.js"></script>
                <!-- fin mensaje para la contraseña -->
            </form>
        </div>
        <!-- Fin registrar -->
        <script>
                // Obtener el modal
                var modal1 = document.getElementById('id01');
                var modal2 = document.getElementById('id02');
                // Cuando el usuario haga clic en cualquier lugar fuera del modal, ciérrelo
                window.onclick = function(event2) {
                    if (event2.target == modal1 || event2.target == modal2 ) {
                        modal1.style.display = "none";
                        modal2.style.display = "none";
                    }
                }      
        </script>


  <div class="w3-row pag1">
      <?php
            $total=0;
          if (isset($_SESSION['carrito'])) {
            $datos=$_SESSION['carrito'];
            $total=0;
            for($i=0;$i<count($datos);$i++){

            ?>
            <div class="productos_c">
              <div class="img_pro">
                <img src="../img/p/<?php echo $datos[$i]['imagen'];?>">
              </div>
                <span class="nombre"><?php echo $datos[$i]['nombre'];?></span>
                <span class="precio">$ <?php echo $datos[$i]['precio'];?></span>
                <div class="cantidad">
                <span>cantidad:
                    <input class="cantidad_in" type="text" value="<?php echo $datos[$i]['cantidad'];?>"
                    data-precio="<?php echo $datos[$i]['precio'];?>"
                    data-id="<?php echo $datos[$i]['id'];?>">
                </span>
                <span class="subtotal">Subtotal: <?php echo $datos[$i]['cantidad']*$datos[$i]['precio'];?></span>
                <a  class="en_eliminar" data-id="<?php echo $datos[$i]['id'];?>">&times;</a>
            </div>
            </div>
            <?php
            $total=($datos[$i]['cantidad']*$datos[$i]['precio'])+$total; 

             } 
               echo "<h2 id='total'>Total: ".$total."</h2>";
              if ($session==null) {
                // pagar no inicio sesion
                ?>

                <div class='cua_btn'>
              <button onclick="document.getElementById('id01').style.display='block'">Pagar</button>
              </div>
                <?php
              }else{
                //Pagar
?>
                
               <div class='cua_btn'>
                <a href="pagar.php" class="btn-liquid">
                 <span class="inner">Pagar</span>
              </a>
            </div>
                
              <script type="text/javascript" src="../js/glibyte_lq.js"></script>
<?php
              }
               

               //Pagar PayPal
      ?>
          
      <?php

        }else{
           echo '<h2>No hay nada :(</h2>';
         }
         
         echo "<h2><a href=../>Ver catalogo</a></h2>";  
     ?>
    
    
    
  </div>


 <!-- End page content -->
</div>


<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
