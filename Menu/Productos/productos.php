<!DOCTYPE html>

<html >

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>Categorias</title>
      

       <link rel='stylesheet' type='text/css' href='../../css/formularios.css' />

       <link rel='stylesheet' type='text/css' href='../../css/menu.css' />

       <link rel='stylesheet' type='text/css' href='../../css/consulta.css' />

       

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

include('../../Mesas/phpqrcode/qrlib.php');


	echo"<nav class='menu'>

	  <ol>

	  	<li class='menu-item'><a href='../Inicio/inicio.php'>Inicio</a></li>

	   	<li class='menu-item'><a href='../Ventas/ventas.php'>Ventas</a></li>

	   	<li class='menu-item'><a href='../Meseros/agregarMeseros.php'>Meseros</a></li>

	   	<li class='menu-item'><a href='../Mesas/mesas.php'>Mesas</a></li>

	   	<li class='menu-item' style='background-color:#000'><a href='../mainMenu.php' style='color:#fff'>Menú</a></li>

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


	    	   if(isset($_GET['id']))

	    	   	$id = $_GET['id'];

	    	   	

	    	   if($_GET['eliminar'] == 1){

	    	   	$reg=mysqli_query($linck,"UPDATE `productos` SET status = 0 WHERE `id` = '$id';");

	    	   	$id="";

	    	   }

	    	   else if($_POST['editar'] || $_POST['agregar']){

	    	   	   $id_categoria=$_POST['categoria'];

			   $producto=$_POST['producto'];

			   $precio=$_POST['precio'];

			   $descripcion=$_POST['descripcion'];

			   

			   if($_POST['agregar'])

		    	  	$reg=mysqli_query($linck,"INSERT INTO `productos` (`producto`, `descripcion`, `precio`, `id_categoria`, `id_propietario`) VALUES ('$producto', '$descripcion', '$precio', '$id_categoria', '$id_propietario');");	

		    	   else if($_POST['editar']){

			   	$reg=mysqli_query($linck,"UPDATE `productos` SET `producto` = '$producto', `descripcion` =  '$descripcion', `precio` = '$precio', `id_categoria` = '$id_categoria' WHERE `id` = '$id';");

			   	$id ="";

			   }	

			   	

	    	   	

	    	   }else if($_GET['editar'] == 1){

	    	   	$productos=mysqli_query($linck,"SELECT * FROM `productos` WHERE `id` = '$id';");

			while ($ag = mysqli_fetch_array($productos)){

				$id_categoriac = $ag['id_categoria'];

				$productoc = $ag['producto'];

				$precioc = $ag['precio'];

				$descripcionc = $ag['descripcion'];

			}

	    	   }

	    

	    	   

	    	   

			      

			 echo"

			 <div class='container_base'>

				   <div class='left'>

				   

				   		<br><div class='container'>

						  <form action='productos.php?id=".$id."' method='post' enctype='multipart/form-data'>

						    <div class='row'>

						      <h4>Registro de productos</h4>

						      

						      <div class='input-group input-group-icon'>

						        <select name='categoria' required>

						            <option value=''></option>";

						            

						$categorias=mysqli_query($linck,"SELECT * FROM `categorias` WHERE `id_propietario` = '$id_propietario' ORDER BY `categoria`;");

						while ($ag = mysqli_fetch_array($categorias))

							if($id_categoriac == $ag['id'])

								echo"<option selected value='".$ag['id']."'>".$ag['categoria']."</option>";

						       	else

						       		echo"<option value='".$ag['id']."'>".$ag['categoria']."</option>";

						   	

						   	echo"</select>

							<div class='input-icon'><i class='fa fa-envelope'></i></div>

						      </div>

						      

						      <div class='input-group input-group-icon'>

						        <input type='text' name='producto' placeholder='Nombre del producto' required value='".$productoc."'/>

						        <div class='input-icon'><i class='fa fa-envelope'></i></div>

						      </div>

						      

						      <div class='input-group input-group-icon'>

						        <input type='number' name='precio'  step='0.01' placeholder='Precio del producto' required value='".$precioc."'/>

						        <div class='input-icon'><i class='fa fa-envelope'></i></div>

						      </div>

						      

						      <div class='input-group input-group-icon'>

						        <textarea name='descripcion' rows='10' cols='77' placeholder='Descripción del producto' required>".$descripcionc."</textarea>

						        

						      </div>

						      

						      <br><br><br>";

						      	

						      	if($_GET['editar']==1)

						      		echo"<input name='editar' type='submit' id='agregar' value='Guardar cambios'>";

						      	else

						      		echo"<input name='agregar' type='submit' id='agregar' value='Agregar'>";

						     

						      echo"

						      </div>

						  </form>

						</div>

						

				   </div>

				   <div class='right'>

				   

				   	<div class='tbl-header'>

					    <table cellpadding='0' cellspacing='0' border='0'>

					      <thead>

					        <tr>

					          <th style='color:#fff'>Producto</th>

					          <th style='color:#fff'>Precio</th>

					          <th style='color:#fff'>Descripción</th>

						  <th style='color:#fff; width:20%;'></th>

						  <th style='color:#fff; width:20%;'></th>

					        </tr>

					      </thead>

					    </table>

					  </div>

					  <div class='tbl-content'>

					    <table cellpadding='0' cellspacing='0' border='0'>

					      <tbody>";

					       $consulta=mysqli_query($linck,"SELECT * FROM `productos` WHERE status = 1 AND id_propietario = '$id_propietario' ORDER BY id_categoria, producto;");

					      	while ($row = mysqli_fetch_array($consulta)){

					      		$id_categoria = $row['id_categoria'];

					      		

					      		$categoriasc=mysqli_query($linck,"SELECT * FROM `categorias` WHERE id = '$id_categoria';");

					      		while ($rowc = mysqli_fetch_array($categoriasc))	

					      			$categoria = $rowc['categoria'];	

					      		

					           

					            echo"

					            <tr class='cuerpo'>

						            <td>".$row['producto']."<br>".$categoria."</td>

						            <td>$".$row['precio']."</td>

						            <td>".$row['descripcion']."</td> 

						            <td style='width:20%'><a href='productos.php?id=".$row['id']."&eliminar=1'>

						            <img src='img/cancelar.png' id='cancelar' height='20em' width='20em'></a></td>

						            <td style='width:20%'><a href='productos.php?id=".$row['id']."&editar=1'>

						            <img src='img/editar.png' id='cancelar' height='20em' width='20em'></a></td>

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