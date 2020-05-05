<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Plantillas</title>
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
				   		<button style='width: 10em; padding: 1em; color: black; background-color: #F4D03F; border: none; border-radius: 3px; position: absolute; float:right;' onclick=\"window.location.href = 'paso1.php'\"><strong>Agregar nueva plantilla</strong></button>
						  <center><h3>Plantillas</h3><br><br>";
						  $prueba=5;
						  if($prueba>0){
						  	echo"<div style='overflow-x: scroll; white-space: nowrap;'>";
						  		for($i=0; $i<$prueba; $i++){
						  			echo"<div style='height:300px; width:200px; border: 4px dotted blue; display: inline-block; margin-right: 20px; border-radius:20px;'>
							  			<p>Las plantillas terminadas</p>
							  			<p>se visualizaran desde aqui</p>
							  		</div>";
						  		}
						  	echo"</div>";
						  }
						  echo"</center>

						</div><!--cierra container-->
						
				    </div><!--cierra center-->
				   
			</div><!--cierra container base-->

</body>";

mysqli_close($linck);
?>

</html>