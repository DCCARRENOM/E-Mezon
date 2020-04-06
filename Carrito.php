<!DOCTYPE html>
<html lang="ES">
<title>E-mezon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Estilos.csss" type="text/css" media=screen>


<style>
  .w3-sidebar a {
    font-family: "Roboto", sans-serif;
    font-family: "Montserrat", sans-serif;
}
  }
</style>

<body class="w3-content" style="max-width: 2000px;">

  <!-- Sidebar/menu -->


  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
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
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"
      onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
        class="fa fa-bars"></i></a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
    id="myOverlay"></div>

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
        <a class="fa fa-shopping-cart w3-margin-right" href="https://www.google.com"></a>
        <a class="fa fa-user-circle-o " style="color: black;" href="login.php" ></a>
      </div>
    </header>

    
      
    <?php
     $conexion= mysqli_connect( 'localhost','root','','e-mezon');
     $sql= "SELECT * FROM transacciones";
    $result=mysqli_query($conexion,$sql);?>
    <div class="w3-container w3-padding-32">
      <table class="w3-table-all">
        <thead>
          <tr class="w3-blue">
          <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tr>
         <?php    while($columna = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $columna['Producto'] . "</td>";
          echo "<td>" . $columna['Cantidad'] . "</td>";
          echo "<td>" . $columna['Valor'] . "</td>";
          echo "</tr>";
    }?>
</tr>

<div class="container w3-right">
<form action="carrito.php" method="post">
<button class="w3-red w3-button" type="submit" name="limpiar">Borrar todo </button>
<div class="container w3-left">
<form action="carrito.php" method="post">
<button class="w3-green w3-button" type="submit" name="Comprar">Comprar </button>
  </form>

  </div>
    <!--Tabla Carrito -->
 

   

   

    <!-- Footer -->
   
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
<?php
if (isset($_POST['limpiar'])){
  $conexion=mysqli_connect( 'localhost','root','','e-mezon');
  $sql="DELETE FROM transacciones WHERE Cantidad > 0 ";
  $result= mysqli_query($conexion,$sql);


}


?>


</html>