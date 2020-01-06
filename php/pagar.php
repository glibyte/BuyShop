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
<title><?php echo $session?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/css_002.css">
<link rel="stylesheet" href="../css/icons.css">
<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="../css/login_signup.css"/>
<link rel="stylesheet" href="../css/menu1.css"/>
<link rel="stylesheet" href="../css/pagar.css"/>

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
  <h1 class="w3-bar-item"><?php echo $session?></h1>
  <p class="w3-bar-item"><?php echo $email?></p>
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
                    <!--<a href="#!">Mi cuenta</a>-->
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
                    <span class="psw">
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

<div class="tab_menu">
  <button class="tablinks" onclick="openForm(event, 't_envio')" id="step1">Envío</button>
  <button class="tablinks" onclick="openForm(event, 't_pago')" id="step2">Forma de pago</button>
  <button class="tablinks" onclick="openForm(event, 't_confirmar')" id="step3">Confirmar</button>
</div>
  <div class="row">
     <div class="col-75">
      <div class="container">


        <div id="t_envio" class="tabcontent">
          <form id="regForm" action="registrar_direccion.php" method="POST">
        <h1>Dirección de envío</h1>
        <?php

                  $direccion = "";
                  $city = "";
                  $estado = "";
                  $cp = "";
                  $usena = $session;
                  $cor = $email;
            $d_u=$mysql->query("select * from direcciones d
            join usuarios u on u.id = d.id_user
            where u.uname='$session'
            order by id_dire desc
            limit 1;")
                or die ($mysql-> error);
                while ($rows=$d_u->fetch_array()) {
                  $direccion = $rows[1];
                  $city = $rows[2];
                  $estado = $rows[3];
                  $cp = $rows[4];
                  $usena = $rows[7];
                  $cor = $rows[8];
                             }
            ?>

<!-- One "tab" for each step in the form: -->
      <div class="tab">
        <label for="fname"><i class="icon icon-user"></i> Nombre</label>
        <?php
       echo "<input type='text' id='fname' name='firstname' placeholder='Nombre(s)'' oninput='this.className = ''' value='$usena'>";
        ?>
        <label for="email"><i class="icon icon-envelop"></i> Email</label>
        <?php
       echo "<input type='text' id='email' name='email' placeholder='ruiz@example.com' oninput='this.className = ''' value='$cor'>";
        ?>
        
      </div>

    <div class="tab">
      <label for="adr"><i class="icon icon-location"></i> Dirección</label>
      <?php
      echo "<input type='text' id='adr' name='address' placeholder='62 W. 17th Street' oninput='this.className = ''' value='$direccion'>";
      ?>
      
      <label for="city"><i class="icon icon-office"></i> Ciudad</label>
      <?php
      echo "<input type='text' id='city' name='city' placeholder='México' oninput='this.className = ''' value='$city'>";
      ?>
      

    <div class="row">
                  <div class="col-50">
                    <label for="state">Estado</label>
                    <?php
      echo "<input type='text' id='state' name='state' placeholder='Michoacán' oninput='this.className = ''' value='$estado'>";
      ?>
                    
                  </div>
                  <div class="col-50">
                    <label for="zip">CP / Zip</label>
                    <?php
      echo "<input type='text' id='zip' name='zip' placeholder='59374' oninput='this.className = ''' value='$cp'>";
      ?>
                    
                  </div>
                </div>

    </div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
</div>
</form> 

    </div>
  

  <div id="t_pago" class="tabcontent">
  <form id="regForm2" action="pagar.php" method="POST">
    <h1>Forma de pago</h1>
  <div class="tab2">
  <label class="container_fp">Tarjeta de Credito/Debito
    <?php
    if (isset($_POST['radio'])) {
    
    if ($_POST['radio']=="radio1") {
      echo " <input type='radio' checked='checked' name='radio' value='radio1'>";
    }else{
    ?>
  <input type="radio" name="radio" value="radio1">
  <?php
}
}else{
  ?>
<input type="radio" name="radio" checked='checked' value="radio1">
<?php
}
?>
<div class="mastercard_small">
  <img src="../img/marcas/mastercard.png">
</div>
</label>
<label class="container_fp">PayPal
  <?php
  if (isset($_POST['radio'])) {
    if ($_POST['radio']=="radio2") {
      echo " <input type='radio' checked='checked' name='radio' value='radio2'>";
    }else{
    ?>
  <input type="radio" name="radio" value="radio2">
  <?php
}
}else{
  ?>
<input type="radio" name="radio" value="radio2">
<?php
}
?>
<div class="paypalsec_small">
  <img src="../img/marcas/paypal_1.png">
</div>
</label>

  </div>
  <div style="overflow:auto;">
  <div style="float:right;">
    <button type="submit">Submit</button>
  </div>
</div>
</form>
<script type="text/javascript" src="../js/pagar.js"></script>
  </div>

  <div id="t_confirmar" class="tabcontent">
  <h1>Confirmar Datos</h1>
  <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Dirección de Envio</h3>
            
            <label for="fname"><i class="icon icon-user"></i> Nombre</label>
            <?php
            echo "<input type='text' id='fname' name='firstname' placeholder='Jesús A. Ruiz' value='$usena'>";
            ?>
            
            <label for="email"><i class="icon icon-envelop"></i> Email</label>
            <?php
            echo "<input type='text' id='email' name='email' placeholder='ruiz@example.com' value='$cor'>";
            ?>
            
            <label for="adr"><i class="icon icon-location"></i> Dirección</label>
            <?php
            echo "<input type='text' id='adr' name='address' placeholder='62 W. 17th Street' value='$direccion'>";
            ?>

            <label for="city"><i class="icon icon-office"></i> Ciudad</label>
            
            <?php
            echo "<input type='text' id='city' name='city' placeholder='México' value='$city'>";
            ?>

            <div class="row">
              <div class="col-50">
                <label for="state">Estado</label>

                <?php
            echo "<input type='text' id='state' name='state' placeholder='Michoacán' value='$estado'>";
                 ?>
                
              </div>
              <div class="col-50">
                <label for="zip">CP / Zip</label>

                <?php
            echo "<input type='text' id='zip' name='zip' placeholder='59374' value='$cp'>";
                 ?>
                
              </div>
            </div>
          </div>
<?php $mysql ->close();?>
          <div class="col-50">
            <h3>Pago</h3>
              <?php

//echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
if (isset($_POST['radio'])) {
if ($_POST['radio']=="radio2") {
  //PAYPAL
  ?>

<div class="paypalsec">
  <img src="../img/marcas/paypal_1.png">
</div>
  <?php
}else{
?>
            <label for="fname">Tarjetas aceptadas</label>
            <div class="icon-container">
              <i class="icon icon-credit-card" style="color:navy;"></i>
              <i class="icon icon-credit-card" style="color:blue;"></i>
              <i class="icon icon-credit-card" style="color:red;"></i>
              <i class="icon icon-credit-card" style="color:orange;"></i>
            </div>
            <label for="cname">Nombre en la tarjeta</label>
            <input type="text" id="cname" name="cardname" placeholder="Jesús Ruiz">
            <label for="ccnum">Número de tarjeta</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Mes</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Año</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>

            <?php
          }
        }else{
?>
<label for="fname">Tarjetas aceptadas</label>
            <div class="icon-container">
              <i class="icon icon-credit-card" style="color:navy;"></i>
              <i class="icon icon-credit-card" style="color:blue;"></i>
              <i class="icon icon-credit-card" style="color:red;"></i>
              <i class="icon icon-credit-card" style="color:orange;"></i>
            </div>
            <label for="cname">Nombre en la tarjeta</label>
            <input type="text" id="cname" name="cardname" placeholder="Jesús Ruiz">
            <label for="ccnum">Número de tarjeta</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Mes</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Año</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          <?php
        }
            ?>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Dirección de envío igual a la facturación
        </label>
         <?php
         if (isset($_POST['radio'])) {
         if ($_POST['radio']=="radio1") {
         ?>
         <a class="btn_pagar2" href="op/compras.php">
       <!-- <input type="submit" value="Confirmar" class="btn"> -->
             <div class="btn">
                    Pagar
              </div>
         </a> 
         <?php
       }
     }else{
      ?>
      <a class="btn_pagar2" href="op/compras.php">
       <!-- <input type="submit" value="Confirmar" class="btn"> -->
             <div class="btn">
                    Pagar
              </div>
         </a> 
      <?php
     }
         ?>      
    </form>
    <?php
if (isset($_POST['radio'])) {
         if ($_POST['radio']=="radio2") {
          if (isset($_SESSION['carrito'])) {
          $datos=$_SESSION['carrito'];
          //Pagar Paypal
          ?>
          
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="upload" value="1">
          <input type="hidden" name="business" value="skarlnite@gmail.com">
          <input type="hidden" name="currency_code" value="MXN">
          
          <?php 
            for($i=0;$i<count($datos);$i++){
          ?>
            <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php 
            echo $datos[$i]['nombre'];?>">
            <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php 
            echo $datos[$i]['precio'];?>">
            <input  type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php 
            echo $datos[$i]['cantidad'];?>">  
          <?php 
            }
          }
          ?>          
          <center>
            <input class="btn" type="submit" value="PayPal" class="aceptar" style="width:200px">
           </center>
      </form>
         <?php
       }
     }
         ?>
  </div>

  <script>
function openForm(evt, formName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(formName).style.display = "block";
  evt.currentTarget.className += " active";
}
// setp1
document.getElementById("step1").click();
</script>


  </div>
</div>

  <div class="col-25">
    <div class="container">
       <?php
       $total=0;
          if (isset($_SESSION['carrito'])) {
            $datos_c=$_SESSION['carrito'];
            $total=0;
            ?>
        <h4>Cart <span class="price" style="color:black"><i class="icon icon-cart"></i> <b><?php echo count($datos_c)?></b></span></h4>
         <?php 
            for($i=0;$i<count($datos_c);$i++){
            ?>    
             <p><a><?php echo $datos_c[$i]['nombre'];?></a></p>
             <p><a>Cantidad: <?php echo $datos_c[$i]['cantidad']?></a><span class="price">$<?php echo $datos_c[$i]['cantidad']*$datos_c[$i]['precio'];?></span></p>
            <hr>
            <?php 
               $total=($datos_c[$i]['cantidad']*$datos_c[$i]['precio'])+$total;
               } 

               ?>
      <p>Total<span class="price" style="color:black"><b>$<?php echo $total ?></b></span></p>
      <?php } else{
          ?>
          <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>0</b></span></h4>
              <p>No hay productos :(</p>
          <?php 
      }
          ?>
    </div>
  </div>
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
