<?php 
session_start(); 
//error_reporting(0);
    $session=null;
if (isset($_SESSION['admin'])) {
    $session = $_SESSION['admin'];
}else{
    echo "No tienes acceso";
        die();
}
  /*  if ($session == null || $session='') {
        echo "no tines acceso";
        die();
    }*/

?>
<html>
    <head>
        <title>
            Panel de control
        </title>
        <meta charset="utf-8"/>
        <!-- estilos -->
        <link rel="stylesheet" type="text/css" href="../css/panelcontrol.css">
        <link rel="stylesheet" type="text/css" href="../../css/icons.css">
        <!-- estilos -->
        <script type="text/javascript" src="../../js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../js/modificar.js"></script>
    </head>
    <body>
        <!-- menu -->
<div class="menu-left">
  <a class="tablinks" onclick="mostrar_contenido(event, 'uc')" id="defaultOpen"><span><i class="icon-cart"></i>&nbsp;</span>Compras</a>
  <a class="tablinks" onclick="myAccFunc()"><span><i class="icon-price-tags"></i>&nbsp;</span>Productos</a>
  <div id="demoAcc" class="hide">
    <a class="tablinks" onclick="mostrar_contenido(event, 'p')">Administrar</a>
    <a class="tablinks" onclick="mostrar_contenido(event, 'ap')">Agregar</a>
    <hr>
  </div>
  <a class="tablinks" onclick="myAccFunc3()"><span><i class="icon-users"></i>&nbsp;</span>Users</a>
  <div id="userAcc" class="hide">
    <a class="tablinks" onclick="mostrar_contenido(event, 'usuarios')">Registrados</a>
    <a class="tablinks" onclick="mostrar_contenido(event, 'd_user')">Borrar</a>
    <hr>
  </div>
  <a class="tablinks" onclick="myAccFunc2()"><span><i class="icon-user-tie"></i>&nbsp;</span>Admin</a>
  <div id="adminAcc" class="hide">
    <a class="tablinks" onclick="mostrar_contenido(event, 'addadmin')">Agregar</a>
    <a class="tablinks" onclick="mostrar_contenido(event, 'deladmin')">Borrar</a>
    <hr>
  </div>
  <a class="tablinks" onclick="myAccFunc4()"><span><i class="icon-cog"></i>&nbsp;</span>BD</a>
  <div id="adminAcc" class="hide">
   
    <hr>
  </div>
  
  
  
  <a href="cerrar_session_admin.php"><span><i class="icon-exit"></i>&nbsp;</span>Salir</a>
</div>
        <!-- fin menu-->
<div class="contenido">
        <h1>panel de control</h1>
        <h3>[<?php echo $session?>]</h3>
  <div id="usuarios" class="tabcontent">
     <h3>usuarios</h3>
       <p>Usuarios Registrados</p>
        <table width="70%" border="1px" align="center">
                <tr align="center">
                   <td>id</td>
                   <td>user name</td>
                   <td>email</td>
                   <td>password</td>
                </tr>
        <?php
        include'conexion.php';
                $info=$mysql->query("select * from usuarios")
                or die ($mysql-> error);
            while ($data=$info->fetch_array()) {
         ?>
                <tr>
                  <td><?=$data["id"]?></td>
                  <td><?=$data["uname"]?></td>
                  <td><?=$data["email"]?></td>
                  <td><?=$data["psw"]?></td>
                </tr>
         <?php }  $mysql ->close();?>
    </table>
  </div>
  <div id="d_user" class="tabcontent">
           <h3>Borrar Usuario</h3>
        <p>Usuarios Registrados</p>
        <!-- tabla -->

        <!-- fin tabla-->
  </div>
  <div id="uc" class="tabcontent">
           <h3>Ultimas compras</h3>
        <p>Productos</p>
        <!-- tabla -->
                <table width="70%" border="1px" align="center">
                <tr align="center">
                   <td>Imagen</td>
                   <td>Nombre</td>
                   <td>Precio</td>
                   <td>Cantidad</td>
                   <td>Subtotal</td>
                </tr>
        <?php
        include'conexion.php';
                $info=$mysql->query("select * from compras")
                or die ($mysql-> error);
            while ($data=$info->fetch_array()) {
         ?>
                <tr>
                  <td><img class="imagen_pro" src="../../img/p/<?=$data["imagen"]?>"></td>
                  <td><?=$data["nombre"]?></td>
                  <td><?=$data["precio"]?></td>
                  <td><?=$data["cantidad"]?></td>
                  <td><?=$data["subtotal"]?></td>
                </tr>
         <?php }  $mysql ->close();?>
    </table>
        <!-- fin tabla-->
  </div>

<div id="p" class="tabcontent">
           <h3>Administrar Productos</h3>
        <p>Productos</p>
        <!-- tabla -->
          <table width="70%" border="1px" align="center">
                <tr align="center">
                  <td>Id</td>
                  <td>Nombre</td>
                  <td>Descripcion</td>
                  <td>Precio</td>
                  <td>Eliminar</td>
                  <td>Modificar</td>
                </tr>
        <?php
        include'conexion.php';
                $info=$mysql->query("select * from productos")
                or die ($mysql-> error);
            while ($row=$info->fetch_array()) {
              echo '
        <tr>
          <td>
            <input type="hidden" value="'.$row[0].'">'.$row[0].'
            <input type="hidden" class="imagen" value="'.$row[3].'">
          </td>
          <td><input type="text" class="nombre" value="'.$row[1].'"></td>
          <td><input type="text" class="descripcion" value="'.$row[2].'"></td>
          <td><input type="text" class="precio" value="'.$row[4].'"></td>
          <td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
          <td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
        </tr>
        ';
        }  $mysql ->close();?>
    </table>
        <!-- fin tabla-->
  </div>

  <div id="ap" class="tabcontent">
           <h3>Agregar Productos</h3>
        <!-- Registrar -->
        <div class="modal">
            <form class="modal-content" action="altaproducto.php" method="POST" enctype="multipart/form-data">
                
                <div class="container">
                    <label for="nom_pro">
                        <b>
                            Nombre
                        </b>
                    </label>
                    <input type="text" placeholder="Nombre" name="nom_pro" required/>
                    <label for="desc_pro">
                        <b>
                            Descripcion
                        </b>
                    </label>
                    <input type="text" placeholder="Descripcion" name="desc_pro" required/>
                    <label for="img_pro">
                        <b>
                            Imagen
                        </b>
                    </label></br>
                    <input type="file" name="file" required/></br>
                    <label for="pre_pro">
                        <b>
                            Precio
                        </b>
                    </label>
                    <input type="text" placeholder="Precio" name="pre_pro" required/>
                    <button type="submit" class="lore">
                        Agregar
                    </button>
                    
                    
                </div>
                
            </form>
        </div>
        <!-- Fin registrar -->
  </div>
  
  <div id="addadmin" class="tabcontent">
           <h3>Agregar administrador</h3>
        <!-- Registrar -->
        <div class="modal">
            <form class="modal-content" action="registrar_admin.php" method="POST">
                
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
                    <input type="password" placeholder="Contraseña" id="psw" name="psw" pattern="(?=.*\d).{8,}" title="Debe contener al menos un número y 8 o más caracteres" required/>
                    <label for="psw">
                        <b>
                            Confirmar Contraseña
                        </b>
                    </label>
                    <input type="password" placeholder="Contraseña" name="psw_repeat" required/>
                    <button type="submit" class="lore">
                        Regístrar
                    </button>
                    
                    
                </div>
                
            </form>
        </div>
        <!-- Fin registrar -->
  </div>
  <div id="deladmin" class="tabcontent">
           <h3>Borrar Admin</h3>
        <p>Administradores</p>
        <!-- tabla -->
        <!-- fin tabla-->
  </div>

</div>
<script>
  function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("show") == -1) {
    x.className += " show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
 function myAccFunc2() {
  var x = document.getElementById("adminAcc");
  if (x.className.indexOf("show") == -1) {
    x.className += " show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myAccFunc3() {
  var x = document.getElementById("userAcc");
  if (x.className.indexOf("show") == -1) {
    x.className += " show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

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
    </body>
</html>
