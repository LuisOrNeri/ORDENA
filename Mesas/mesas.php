<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>Mesas</title>
    

       <link rel='stylesheet' type='text/css' href='../css/formularios.css' />

       <link rel='stylesheet' type='text/css' href='../css/menu.css' />

       <link rel='stylesheet' type='text/css' href='../css/consulta.css' />
  

       

</head>

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


<body>

<?php

include('phpqrcode/qrlib.php');

	echo"<nav class='menu'>

	  <ol>

	  	<li class='menu-item'><a href='../Inicio/inicio.php'>Inicio</a></li>

	   	<li class='menu-item'><a href='../Ventas/ventas.php'>Ventas</a></li>

	   	<li class='menu-item'><a href='../Meseros/agregarMeseros.php'>Meseros</a></li>

	   	<li class='menu-item' style='background-color:#000'><a href='mesas.php' style='color:#fff'>Mesas</a></li>

	   	<li class='menu-item'><a href='../Menu/mainMenu.php'>Menú</a></li>

	   	<li class='menu-item'><a href='../Paypal/Checkout.php'>Usuario</a>

		  

		</li>

	  </ol>

	</nav>";



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

//////////////////////////////////////////////////////


session_start();
$id_propietario = $_SESSION['id'];

$mesa = "";



      			   
	    	   if(isset($_GET['id'])){

	    	   	$id = $_GET['id'];

	    	   	$borrar=mysqli_query($linck,"SELECT * FROM `mesas` WHERE `id_mesa` = '$id' AND `id_propietario` = '$id_propietario';");

			while ($rowb = mysqli_fetch_array($borrar))

				$img = "QR/".$rowb['QR'];

				

	    	   	$reg=mysqli_query($linck,"DELETE FROM `mesas` WHERE `id_mesa` = '$id' AND `id_propietario` = '$id_propietario';");

	    	   	unlink($img);

	    	   	$id = "";

	    	   }

	    

	    	   if(isset($_POST['QR']) || isset(($_POST['agregar']))){

		    	   //$mesa=$_POST['mesa'];

			   //$QR = $mesa.".png";

			   

			   if(isset($_POST['QR']))

				$mesa=$_POST['mesa'];	$QR=$mesa.'-'.$id_propietario.'.png';
				QRcode::png($mesa, "QR/".$QR, QR_ECLEVEL_L,10,2);

			   if(isset($_POST['agregar'])){

			   	$mesa=$_POST['nom']; $QR=$mesa.'-'.$id_propietario.'.png';
			   	$reg=mysqli_query($linck,"INSERT INTO `mesas` (`nombre`, `QR`, `id_propietario`) VALUES ('$mesa', '$QR', '$id_propietario');");	

			   	$mesa = "";

			   }

	    	   }

	    	   
     

			 echo"

			 <div class='container_base'>

				   <div class='left'>

				   

				   		<br><div class='container'>

						  <form action='mesas.php' method='post' enctype='multipart/form-data'>

						    <div class='row'>

						      <h4>Registro de mesas</h4>";

							if(isset($_POST['QR'])){

							       echo"

							       <div class='input-group input-group-icon' style='text-align:center'>

								<img src='QR/".$QR."'/>
								<input type='hidden' name='nom' value='".$mesa."' />

							       </div>";

							 }
							 else{

						       echo"

						      <div class='input-group input-group-icon'>

						        <input type='text' name='mesa' placeholder='Nombre/ID de la mesa' required value='".$mesa."'/>

						        <div class='input-icon'><i class='fa fa-envelope'></i></div>

						      </div><br><br><br>";
						  	 }

						      

						      if(isset($_POST['QR'])){

						      	echo"<input name='agregar' type='submit' id='accionform' value='Agregar'>";

						      }
						      else{

						      	echo"<input name='QR' type='submit' id='accionform' value='Generar QR'>";

						      }
						    	

						    echo"</div>

						  </form>

						</div>

						

				   </div>

				   <div class='right'>

				   

				   	<div class='tbl-header'>

					    <table cellpadding='0' cellspacing='0' border='0'>

					      <thead>

					        <tr>

					          <th style='color:#fff'>Mesa</th>

					          <th style='color:#fff'></th>

						  <th style='color:#fff; width:20%;'></th>

					        </tr>

					      </thead>

					    </table>

					  </div>

					  <div class='tbl-content' style='height:450px;'>

					    <table cellpadding='0' cellspacing='0' border='0'>

					      <tbody>";

					       $consulta=mysqli_query($linck,"SELECT * FROM `mesas` WHERE estado = 0 AND id_propietario = '$id_propietario' ORDER BY id_mesa;");

					      	while ($row = mysqli_fetch_array($consulta)){

					      		$img = $row['QR'];

					    

					            echo"

					            <tr class='cuerpo'>

						            <td>".$row['nombre']."</td>

						            <td><img src='QR/".$img."' height='20em' width='20em' /></td> 

						            <td style='width:20%'><a href='mesas.php?id=".$row['id_mesa']."'>

						            <img src='../img/cancelar.png' id='cancelar' height='20em' width='20em'></a></td>

					            </tr>";

					        }  

					 echo"</tbody>

					    </table>

					  </div>

				   

				   </div>

				   

			</div>"; //contenedor base

			 
  mysqli_close($linck);

?>

</body>

</html>