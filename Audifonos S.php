<!DOCTYPE html>
<html lang="ES">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>

<head>
</head>

<body class="w3-content" style="max-width:2200px">
  


<!-- Sidebar/menu -->


<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <!--<h3 class="w3-wide"><b>LOGO</b></h3>-->
    <div class="w3-wide">
      <img src="https://i.ibb.co/qMNnw03/LOGO-E-MEZON.png"
      style="width:100%">
    </div>

    </div>
  </div>
  <div class="w3-padding-64 w3-large w3-text-black" style="font-weight:bold">
    <a href="index.php" class="w3-bar-item w3-button">Inicio</a>
    <a href="Camaras.html" class="w3-bar-item w3-button">Camaras</a>
    <a href="Televisores.html" class="w3-bar-item w3-button">Televisores</a>
    <a href="Videojuegos.html" class="w3-bar-item w3-button">Videojuegos</a>
    <a href="Celulares.html" class="w3-bar-item w3-button">Celulares</a>
    <a href="Computadores.html" class="w3-bar-item w3-button">Computadores</a>
    <a href="Perifericos.html" class="w3-bar-item w3-button">Perifericos</a>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
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
    <p class="w3-left">E-Mezon</p>
    <p class="w3-center"></p>
    <div class="w3-right">
      <input type="text" placeholder="Buscar..." style="height: 36px">
      <button class="w3-button w3-teal w3-medium">Buscar</button>
      <a class="fa fa-shopping-cart w3-margin-right" href="Carrito.php"></a>
      <!--<a class="fa fa-search w3-margin-right"></a> -->
      <a class="fa fa-user-circle-o " style="color: black;" href="login.php" ></a>
    </div>
  </header>

 
  <!-- Product grid -->
  <div class="w3-row w3-grayscale w3-padding-64">
    <div class="w3-half">
        <div class="w3-container">
            <img src="https://falabella.scene7.com/is/image/FalabellaCO/3270625_1?wid=1500&hei=1500&qlt=70" style="width: 100%; height:100% ;">
            <!--<img src="C:\Users\Sebastian Wilches\Desktop\Universidad\4 semestre\Programacion avanzada\2 Corte\E-Mezon2\imagenes\PS4.png" style="width:100%">-->
          </div>

    </div>
    <div class="w3-half">
      <h2>Descripcion del producto</h2>
      <pre style="font-family: Roboto;">  
      Audífonos Bluetooth Sennheiser HD 4.40 BT
      Marca: Sennheiser
      Frecuencia: 100-10.000 Hz
      Garantía del proveedor:	1 año</pre>
      <h5>Precio : $249.900</h5>

      <h5>Productos disponibles:</h5>
      <?php
      include("AbrirConexion.php");
      $sql="SELECT Stock FROM Productos WHERE IDProducto = 47";
      $result = mysqli_query($conexion, $sql);
      while($columna = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<h5>". $columna['Stock'] . "</h5>";
        echo "<tr>";
      }
      include("CerrarConexion.php");
      ?>

      <form action="Audifonos S.php" method="POST">
        <button class="w3-button w3-center w3-yellow" name="comprar1">Comprar</button>
      </form> 


      

        <?php
        if(isset($_POST['comprar1'])){
          $conexion= mysqli_connect( 'localhost','root','','e-mezon');
        //$sql2 = "SELECT SUM(Cantidad) as total FROM transacciones WHERE Producto = 'Playstation 4'";
        //$result2 = mysqli_query($conexion, $sql2);
        $sql2="SELECT Cantidad FROM transacciones WHERE Producto = 'Audífonos Bluetooth Sennheiser HD 4.40 BT'";
        $result2 = mysqli_query($conexion,$sql2);
        if( mysqli_num_rows($result2) != 0){
          $sql3= "UPDATE transacciones SET Cantidad = Cantidad +1, valor=valor+249900 WHERE Producto = 'Audífonos Bluetooth Sennheiser HD 4.40 BT'";
          $result3= mysqli_query($conexion,$sql3);
          echo ("Item SUMADO al carrito de compras");
          
          //SI existe uno asi, que le sume uno
        }else{
          if(!$result){
            echo ("");
          }else{
            $sql1= "INSERT INTO transacciones VALUES ('Audífonos Bluetooth Sennheiser HD 4.40 BT', '1', '249900')";
            $result1= mysqli_query($conexion,$sql1);
            echo ("Item AÑADIDO al carrito de compras");
            //SI no existe nada asi, creeme uno
          }
        }



        }
        ?>


    </div>

</div>



  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Suscribete</h1>
    <p>Para recibir ofertas especiales</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Ingresar e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Suscribirse</button>
  </div>

  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contacto</h4>
        <p>Dudas o sugerencias</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Nombre" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Asunto" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Mensaje" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Enviar</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>Acerca de</h4>
        <p><a href="#">Acerca de nosotros</a></p>
        <p><a href="#">Soporte</a></p>
        <p><a href="#">Encontrar una tienda</a></p>
        <p><a href="#">Envio</a></p>
        <p><a href="#">Pago</a></p>
        <p><a href="#">Tarjetas de regalo</a></p>
        <p><a href="#">Ayuda</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Tienda</h4>
        <p><i class="fa fa-fw fa-map-marker"></i>E-Mezon</p>
        <p><i class="fa fa-fw fa-phone"></i> 1234567</p>
        <p><i class="fa fa-fw fa-envelope"></i> E-Mezon@mail.com</p>
        <h4>Aceptamos</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Tarjetas de credito</p>
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

  <div class="w3-black w3-center w3-padding-24">Librerias usadas <a href="https://www.w3schools.com/w3css/default.asp"
      title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

  <!-- End page content -->
</div>



<script>



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


