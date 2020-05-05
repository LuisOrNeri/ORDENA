<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Menú</title>
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
	</style>

		<link rel='stylesheet' type='text/css' href='../css/formularios.css' />
        <link rel='stylesheet' type='text/css' href='../css/menu.css' />
        <link rel='stylesheet' type='text/css' href='../css/consulta.css' />
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
$aidi = 1;
//$aidi = $_SESSION['id'];



echo"<body>

<nav class='menu'>
	  <ol>
	  	<li class='menu-item'><a href='../Inicio/inicio.php'>Inicio</a></li>
	   	<li class='menu-item'><a href='../Ventas/ventas.php'>Ventas</a></li>
	   	<li class='menu-item'><a href='../Meseros/agregarMeseros.php'>Meseros</a></li>
	   	<li class='menu-item'><a href='../Mesas/mesas.php'>Mesas</a></li>
	   	<li class='menu-item' style='background-color:#000'><a href='mainMenu.php' style='color:#fff'>Menú</a></li>
	   	<li class='menu-item'><a href='../Paypal/Checkout.php'>Usuario</a>
		  
		</li>
	  </ol>
	</nav>

			<div class='container_base'>
				    <div class='center'>
				   		<div class='container' style='max-width:65em;'>";?>
						  <center><button style="width: 300px; height: 100px; font-size:x-large; text-align: center; color: black; background-color: #F4D03F; border: none; border-radius: 3px;" onclick="window.location.href = 'Productos/agregarProductos.php'">Productos</button>
						  <button style="width: 300px; height: 100px; font-size:x-large; text-align: center; color: black; background-color: #F4D03F; border: none; border-radius: 3px;" onclick="window.location.href = 'Categorias/agregarCategorias.php'">Categorías</button>
						  <button style="width: 300px; height: 100px; font-size:x-large; text-align: center; color: black; background-color: #F4D03F; border: none; border-radius: 3px;" onclick="window.location.href = 'MenuDesigner/plantillas.php'">Diseño del menú</button></center>

						<?php echo"</div><!--cierra container-->
						
				    </div><!--cierra center-->
				   
			</div><!--cierra container base-->

</body>";

mysqli_close($linck);
?>

</html>