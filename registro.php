
<!DOCTYPE html>
<html>
  <title>Registrarse</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Pantalla de Registro</h2>


  <div class="imgcontainer">
    <img src="https://img2.freepng.es/20180623/iqh/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c40ce333.6524068515297806760528.jpg" alt="Avatar_Logeo" class="avatar">
  </div>

  <div class="container">
<form action="registro.php" method="post">
    <label for="name"><b>Usuario</b></label>
    <input type="text" placeholder="Introducir Usuario" name="name" required>

    <label for="correo"><b>Correo electronico</b></label>
    <input type="text" placeholder="Introducir Correo electronico" name="correo" required>

    <label for="pass"><b>Contraseña</b></label>
    <input type="password" placeholder="Introducir Contraseña" name="pass" required>
        
    <button type="submit" name="register">Registrarse</button>
   
</form>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href=index.php><button type="button" class="cancelbtn">Cancelar</button></a>
    <span class="psw"> <a href="Login.html">¿Ya tiene usuario?</a></span>
  </div>
</body>
<?php
      if (isset($_POST['register'])){
        $conexion= mysqli_connect( 'localhost','root','','e-mezon');
        $IDUsername = $_POST['name'];
        $Psw = $_POST['pass'];
        $Email = $_POST['correo'];
        $sql="SELECT IDUsername FROM usuarios WHERE IDUsername ='$IDUsername' ";
        $result= mysqli_query($conexion,$sql);
        if( mysqli_num_rows($result) != 0){
          echo ("Usuario no disponible");
        }else{
        if(!$result){
          echo ("");
        }else{
            $sql1= "INSERT INTO usuarios VALUES ('$IDUsername','$Psw','$Email')";
            $result= mysqli_query($conexion,$sql1);
            session_start();
            header ('location:index.php');
        }
      }
    }
?>



</html>
