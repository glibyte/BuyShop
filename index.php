<?php session_start();
//error_reporting(0);
if (isset($_SESSION['usuario'])) {
    $session = $_SESSION['usuario'];
}else{
    $session=null;
}
include 'php/op/conexion.php';
?>

<!DOCTYPE html>
<html>
<title>Aliencix</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/css_002.css">
<link rel="stylesheet" href="css/icons.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/login_signup.css"/>
<link rel="stylesheet" href="css/menu1.css"/>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><p><img src="img/logo/original_200x200.png" width="120" height="120" alt="logo"></p></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Jeans <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
      <a href="#" class="w3-bar-item w3-button">Relaxed</a>
      <a href="#" class="w3-bar-item w3-button">Bootcut</a>
      <a href="#" class="w3-bar-item w3-button">Straight</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-16 w3-wide">
    <img src="img/logo/original_200x200.png" width="50" height="50" alt="logo">
  </div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()">
    <i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>

  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Fashion</p>
      <div class="menu_gb w3-right">
      
      <?php if ( $session!=null ) { ?>
                    <a onclick="myFunction2()">
                    <?php echo $session?>
                    </a>
                    <div class="dropdown">
                    <div id="myDropdown" class="dropdown-content">
                    <!--<a href="#!">Mi cuenta</a>-->
                    <a href="php/login/cerrar_session.php">Cerrar sesión</a>
                    </div>
                </div>
                <!-- para mostrar conetenido del boton -->
                <script type="text/javascript" src="js/btn_usuario.js"></script>
                <!-- para mostrar conetenido del boton -->
               
                <?php } 
                 if ( $session==null ) { ?>
                    <a onclick="document.getElementById('id01').style.display='block'">
                        Inicia sesión
                    </a>
                    <a onclick="document.getElementById('id02').style.display='block'">
                        Regístrate
                    </a>
                <?php } ?>

                <!-- carrito -->
                <a class="car" href="php/carritodecompras.php">
                <i class="icon-cart"></i>
                </a>
    </div>
  </header>
  <!-- Iniciar sesión -->
        <div id="id01" class="modal">
            <form class="modal-content animate" action="php/login/validar_user.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="img/user/avatar/img_user2.png" alt="Avatar" class="avatar"/>
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
        <script type="text/javascript" src="js/cambiar_de_ventana1.js"></script>
        <!-- cambiar de ventana -->
        
        <!-- Fin Iniciar sesión -->

        <!-- Registrar -->
        <div id="id02" class="modal">
            <form class="modal-content animate" action="php/login/registrar.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Cancelar">
                        &times;
                    </span>
                    <img src="img/user/avatar/img_user2.png" alt="Avatar" class="avatar"/>
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
                        <a href="legal/privacy-policy.html">
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
                <script type="text/javascript" src="js/registrar_email_psw.js"></script>
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

  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="img/header/girl3.jpg" alt="girl" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small  w3-animate-top">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium w3-animate-top">New arrivals</h1>
      <h1 class="w3-hide-small w3-animate-left">COLLECTION 2019</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large w3-animate-opacity">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p> <?php 
    $items_query = $mysql->query("select count(*) from productos");
    $items=$items_query->fetch_array(MYSQLI_NUM);
    echo $items[0]; 
    ?> items</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">

    
    <?php
        $registros=$mysql->query("select * from productos")
                   or die(mysql_error());
        while ($reg = $registros->fetch_array()) {
        ?>
        <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <img src="img/p/<?php echo $reg['imagen'];?>" style="width:100%">
                <span class="w3-tag w3-display-topleft">New</span>
                <div class="w3-display-middle w3-display-hover">
                 <button class="w3-button w3-black">
                  <a href="php/detalles.php?id=<?php  echo $reg['id'];?>">Buy now  </a><i class="fa fa-shopping-cart"></i>
                 </button>
                </div>
              </div>
              <p><?php echo $reg['nombre'];?><br><b>$<?php echo $reg['precio'];?></b></p>
          </div>
       </div>            
    <?php
        }
    ?>

  </div>

  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        
        <p><a href="#">Support</a></p>
        <p><a href="#">FAQ</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
        <h4>Legal</h4>
        <p><a href="legal/privacy-policy.html">Privacy policy</a></p>
        <p><a href="legal/terms-and-conditions-of-use.html">Terms and conditions</a></p>
        
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Aliencix Records</p>
        <p><i class="fa fa-fw fa-phone"></i> 04412345678</p>
        <p><i class="fa fa-fw fa-envelope"></i> aliencixrecords@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> PayPal</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Copyright <a href="#!" title="Aliencix Records" class="w3-hover-opacity">Aliencix Records</a></div>

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
//document.getElementById("myBtn").click();


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
