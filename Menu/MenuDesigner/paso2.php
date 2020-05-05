<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Paso 2</title>
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
						  <center><h3>Paso 2 - Selecciona el estilo para los productos</h3><br></center>
						  	<div style='position:relative; float:right; width:69%; height:400px; border-radius:30px; background-color: #F4D03F;'>
						  		<br><center>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><br><br><div style='width:80px; float:left; margin-left:5px;'><img src='../../img/default-image.jpg' style='width:70px; height:70px; margin-right:10px;'><p style='font-size: 9px;'>Producto X</p></div><div style='width:80px; float: right;'><img src='../../img/default-image.jpg' style='width:70px; height:70px;'><p style='font-size: 9px;'>Producto Y</p></div><br><br><br><br><br></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><div><p style='font-size: 10px; float: left; margin-left:10px;'><br><br>Producto X</p><img src='../../img/default-image.jpg' style='width:70px; height:70px; border-radius:50px; float:right; margin-right:10px;'></div><br><div><p style='font-size: 10px; float: left; margin-left:10px;'><br><br><br>Producto Y</p><img src='../../img/default-image.jpg' style='width:70px; height:70px; border-radius:50px; float:right; margin-right:10px;'></div><br><br><br><br><br><br></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; '><br><div><img src='../../img/default-image.jpg' style='width:70px; height:70px; border-radius:50px; float:left; margin-left:10px;'><p style='font-size: 10px; float: right; margin-right:10px;'><br><br>Producto X</p></div><div><br><img src='../../img/default-image.jpg' style='width:70px; height:70px; border-radius:50px; float:left; margin-left:-70px; margin-top:51px;'><p style='font-size: 10px; float: right; margin-right:10px;'><br><br><br>Producto Y</p></div><br><br><br><br><br><br></div>
						  			<br><br>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><ul><li>Producto X</li><br><li>Producto Y</li><br><li>Producto Z</li><br></ul></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; margin-right:20px;'><br><div><p style='font-size: 10px; float: left; margin-left:10px;'><br><br>Producto X</p><img src='../../img/default-image.jpg' style='width:70px; height:70px; float:right; margin-right:10px; margin-top:-3px;'></div><br><div><p style='font-size: 10px; float: left; margin-left:10px;'><br><br><br>Producto Y</p><img src='../../img/default-image.jpg' style='width:70px; height:70px; float:right; margin-right:10px; margin-top:3px;'></div><br><br><br><br><br><br></div>
						  			<div tabindex='-1' style='width:170px; height:170px; background:white; display: inline-block; '><br><div><img src='../../img/default-image.jpg' style='width:70px; height:70px; float:left; margin-left:10px; margin-top:-3px;'><p style='font-size: 10px; float: right; margin-right:10px;'><br><br>Producto X</p></div><div><br><img src='../../img/default-image.jpg' style='width:70px; height:70px; float:left; margin-left:-70px; margin-top:52px;'><p style='font-size: 10px; float: right; margin-right:10px;'><br><br><br>Producto Y</p></div><br><br><br><br><br><br></div>
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
						  						<p style='font-size:10px; float:left; margin-left:30px;'><br>Producto A</p><img src='../../img/default-image.jpg' style='width:55px; height:55px;'>
						  					</div>
						  					<div>
						  						<p style='font-size:10px; float:left; margin-left:30px;'><br>Producto B</p><img src='../../img/default-image.jpg' style='width:55px; height:55px;'>
						  					</div>
						  					<div>
						  						<p style='font-size:10px; float:left; margin-left:30px;'><br>Producto C</p><img src='../../img/default-image.jpg' style='width:55px; height:55px;'>
						  					</div>
						  					<div>
						  						<p style='font-size:10px; float:left; margin-left:30px;'><br>Producto D</p><img src='../../img/default-image.jpg' style='width:55px; height:55px;'>
						  					</div>
						  				</div>
						  			</div>
						  		</center>
						  	</div>
						  	<br><center><button style='width: 10em; padding: 1em; color: white; background-color: black; border: none; border-radius: 3px;' onclick=\"window.location.href = 'paso3.php'\"'>Siguiente</button></center>

						</div><!--cierra container-->
						
				    </div><!--cierra center-->
				   
			</div><!--cierra container base-->

</body>";

mysqli_close($linck);
?>

</html>