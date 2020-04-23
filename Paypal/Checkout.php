<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">

	<title>Usuario</title>

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
$aidi = $_SESSION['id'];



echo"<body>

<nav class='menu'>
	  <ol>
	  	<li class='menu-item'><a href='../Inicio/inicio.php'>Inicio</a></li>
	   	<li class='menu-item'><a href='../Ventas/ventas.php'>Ventas</a></li>
	   	<li class='menu-item'><a href='../Meseros/agregarMeseros.php'>Meseros</a></li>
	   	<li class='menu-item'><a href='../Mesas/mesas.php'>Mesas</a></li>
	   	<li class='menu-item'><a href='../Menu/mainMenu.php'>Menú</a></li>
	   	<li class='menu-item' style='background-color:#000'><a href='Checkout.php' style='color:#fff'>Usuario</a>
		  
		</li>
	  </ol>
	</nav>

			<div class='container_base'>
				    <div class='center'>
				   		<div class='container' style='max-width:55em;'>
				   		<a href='../logout.php'>Cerrar Sesión</a>
						  <h3>Información de la cuenta</h3>";

						  $consulta=mysqli_query($linck,"SELECT * FROM `propietarios`;");
						  while ($row = mysqli_fetch_array($consulta)){
								if($row['id_propietario']==$aidi){
									$nompro = $row['nombre'];
								}
						  }

						  echo"<h4>Nombre del establecimiento</h4>";
						  echo $nompro;
						  echo"<br><br>
						  <br><br>
						  <h3>Pago del servicio</h3>
						  <h4>Tipo de plan</h4>
						  <img src='../img/precio1.png' width='200' height='120'>
						  <img src='../img/precio2.png' width='200' height='120' style='position:relative; left:100px;'>";

						  include('config.php');
						  $consulta=mysqli_query($linck,"SELECT * FROM `propietarios`;");
						  while ($row = mysqli_fetch_array($consulta)){
								if($row['id_propietario']==$aidi){
									$paquete = $row['paquete'];
								}
						  }
							$productName = "Mensualidad";
							$currency = "MXN";
							if($paquete == 1){
								$productPrice=269;
							}
							if($paquete == 2){
								$productPrice=499;
							}
							$productId = 587965;
							$orderNumber = 567;
							echo"<div style='float:right;'><br><br>

							<p id='price'>hola</p>
							<td style='width:150px'><center>$ "; echo $productPrice; echo" MXN</center></td><br>
					        <td style='width:150px'>";
					        include 'paypalCheckout.php';
					        echo"</td>
					        </div>

						  <br><br>

						<input type='radio' id='basica' name='pago' value='269' onclick='checkradio(value)'";
						if($paquete==1){echo "checked";} echo">
						<label for='basica'>Básico</label>
						<input type='radio' id='premium' name='pago' value='499' onclick='checkradio(value)'";
						if($paquete==2){echo "checked";} echo">
						<label for='premium'>Premium</label>

						<script>
							function checkradio(value) {
								document.getElementById('price') = value;
							}
						</script>
						<br><br><p id='price'></p>

						</div>
						
				    </div>
				   
			</div>

</body>";

mysqli_close($linck);
?>

</html>