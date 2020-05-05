<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Paso 3</title>
	<style type="text/css">
    .container_base {
      width:100%;
    }
    .left {
      width:50%;
      float:left;
    }
    .right {
      width:50%;
      float:right;
    }
    .tbl-content,.tbl-header{
    	width:90%;
    }
    div:focus{
    	outline: 2px solid black;
    }
	</style>

		<link rel='stylesheet' type='text/css' href='../../css/formularios.css' />
        <link rel='stylesheet' type='text/css' href='../../css/menu.css' />
        <link rel='stylesheet' type='text/css' href='../../css/consulta.css' />
</head>
<?php
$timezone="America/Mexico_City";
$dt=new datetime("now",new datetimezone($timezone));
$hoy = gmdate("Y-m-d",(time()+$dt->getOffset()));
$hora = gmdate("h:i a",(time()+$dt->getOffset()));

$host="localhost";
$user="root";
$password="CETIcolomos";
$linck = mysqli_connect ($host,$user,$password) or die ("No se puede conectar");
mysqli_set_charset($linck,'utf8');
$NombreBD="ordena";
mysqli_select_db($linck,$NombreBD);
session_start();
$aidi = $_SESSION['id'];


echo"<body>

<nav class='menu'>
	  <ol>
	  	<li class='menu-item'><a href='../../Inicio/inicio.php'>Inicio</a></li>
	   	<li class='menu-item'><a href='ventas.php'>Ventas</a></li>
	   	<li class='menu-item'><a href='../../Meseros/agregarMeseros.php'>Meseros</a></li>
	   	<li class='menu-item'><a href='../../Mesas/mesas.php'>Mesas</a></li>
	   	<li class='menu-item' style='background-color:#000'><a href='../mainMenu.php' style='color:#fff'>Menú</a></li>
	   	<li class='menu-item'><a href='../../Paypal/Checkout.php'>Usuario</a>
		  
		</li>
	  </ol>
	</nav>

			<div class='container_base'>
				    <div class='center'>
				   		<div class='container' style='max-width:65em;'>
						  <center><h3>Paso 3 - Selecciona el estilo para las promociones</h3><br></center>
						  	<div style='position:relative; float:right; width:69%; height:400px; border-radius:30px; background-color: #F4D03F;'>
						  		<br><center>
						  		<br><br><br>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><img src='../../img/default-image.jpg' style='width:140px; height:65px;'><img src='../../img/default-image.jpg' style='width:140px; height:65px;'></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><img src='../../img/default-image.jpg' style='width:65px; height:65px; margin-right:10px;'><img src='../../img/default-image.jpg' style='width:65px; height:65px;'><img src='../../img/default-image.jpg' style='width:140px; height:65px;'></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block;'><img src='../../img/default-image.jpg' style='width:75px; height:75px; border-radius:50%; margin-right:10px; position:relative; top:10px;'><img src='../../img/default-image.jpg' style='width:55px; height:55px; border-radius:50%;'><img src='../../img/default-image.jpg' style='width:55px; height:55px; border-radius:50%; margin-right:10px;'><img src='../../img/default-image.jpg' style='width:75px; height:75px; border-radius:50%; position:relative; top:10px;'></div>
						  			<br><br><br><br>
						  			<input type='text' style='width:300px;' placeholder='Nombre para la plantilla' required/>
						  		</center>
						  	</div>
						  	<div style='width:30%;'>
						  		<center>
						  			<div style='width:60%; height:400px; background-color:black; border-radius:20px;'><br>
						  				<div style='width:96%; height:90%; background-color:white; border-radius:20px;'><br>
						  				<div>
						  					<img src='../../img/hamb.png' style='width:15px; height:15px; position:relative; right:40px; top:-7px;'>
						  					<img src='../../img/logo.jpeg' style='width:60px; height:30px; position:relative; left:40px;'>
						  				</div><br>
						  					<div>
						  						<img src='../../img/default-image.jpg' style='width:135px; height:60px;'>
						  					</div>
						  					<div>
						  						<img src='../../img/default-image.jpg' style='width:60px; height:60px; margin-right:10px;'>
						  						<img src='../../img/default-image.jpg' style='width:60px; height:60px;'>
						  					</div>
						  					<div>
						  						<img src='../../img/default-image.jpg' style='width:135px; height:60px;'>
						  					</div>
						  					<div>
						  						<img src='../../img/default-image.jpg' style='width:60px; height:60px; margin-right:10px;'>
						  						<img src='../../img/default-image.jpg' style='width:60px; height:60px;'>
						  					</div>
						  				</div>
						  			</div>
						  		</center>
						  	</div>
						  	<br><center><button style='width: 10em; padding: 1em; color: white; background-color: black; border: none; border-radius: 3px;' onclick=\"window.location.href = 'plantillas.php'\"'>Guardar</button></center>

						</div><!--cierra container-->
						
				    </div><!--cierra center-->
				   
			</div><!--cierra container base-->

</body>";

mysqli_close($linck);
?>

</html>