<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">

	<title>Categorías</title>

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


if(isset($_POST['nombre'])){
	$repetido=0;
	$nombre = $_POST['nombre'];
	$consulta2=mysqli_query($linck,"SELECT * FROM `categorias` WHERE `id_propietario`='$aidi';");
	while ($row = mysqli_fetch_array($consulta2)){
		if($row['nombre']==$nombre){
			$repetido=1;
		}
	}
	if($repetido==0){
		$reg=mysqli_query($linck,"INSERT INTO `categorias` (`nombre`, `id_propietario`) VALUES ('$nombre', '$aidi');");
		echo "<script language='javascript'>"; 
		echo "alert('La categoría se ha AGREGADO exitosamente.')";
		echo "</script>";
	}
	else{
		echo "<script language='javascript'>"; 
		echo "alert('El nombre que ingresaste ya pertenece a otra categoría, intente nuevamente.')";
		echo "</script>";
	}
	$repetido=0;
}


if(isset($_POST['estatus'])){
	$consulta2=mysqli_query($linck,"SELECT * FROM `meseros` WHERE `id_propietario`='$aidi';");
	while ($row = mysqli_fetch_array($consulta2)){
		$estatus = $_POST['estatus'];
		$identurno = $row['id_mesero'];
		$valor = 0;
		if(isset($estatus[$identurno])){
			$valor = 1;
		}
		else{
			$valor = 0;
		}
		$consulta3=mysqli_query($linck,"UPDATE `meseros` SET `disponibilidad` = '$valor' WHERE `id_mesero` = '$identurno' AND `id_propietario`='$aidi';");
	}
	/*echo "<script language='javascript'>";
	echo "alert('Los cambios han sido GUARDADOS.')";
echo "</script>";*/
}
else{
	if(isset($_POST['confirmar'])){
		$consulta2=mysqli_query($linck,"SELECT * FROM `meseros` WHERE `id_propietario`='$aidi';");
		while ($row = mysqli_fetch_array($consulta2)){
			$identurno = $row['id_mesero'];
			$valor = 0;
			$consulta3=mysqli_query($linck,"UPDATE `meseros` SET `disponibilidad` = '$valor' WHERE `id_mesero` = '$identurno' AND `id_propietario`='$aidi';");
		}
		/*echo "<script language='javascript'>";
		echo "alert('Los cambios han sido GUARDADOS.')";
	echo "</script>";*/
	}
}



echo"<body>

<nav class='menu'>
	  <ol>
	  	<li class='menu-item'><a href='../../Inicio/inicio.php'>Inicio</a></li>
	   	<li class='menu-item'><a href='../../Ventas/ventas.php'>Ventas</a></li>
	   	<li class='menu-item'><a href='../../Meseros/agregarMeseros.php'>Meseros</a></li>
	   	<li class='menu-item'><a href='../../Mesas/mesas.php'>Mesas</a></li>
	   	<li class='menu-item' style='background-color:#000'><a href='../mainMenu.php' style='color:#fff'>Menú</a></li>
	   	<li class='menu-item'><a href='../../Paypal/Checkout.php'>Usuario</a>
		  
		</li>
	  </ol>
	</nav>

<div class='container_base'>
				   <div class='left'>

				   		<div class='container'>
						  <form action='agregarCategorias.php' method='post' enctype='multipart/form-data'>
						    <div class='row'>
						      <h4>Agregar nueva categoría</h4>
							       <div class='input-group input-group-icon' style='text-align:center'>
							       </div>
						      <div class='input-group input-group-icon'>
						        <input type='text' name='nombre' placeholder='Nombre' required value=''/>
						        <div class='input-icon'><i class='fa fa-envelope'></i></div>
						      </div><br><br><br>
						      
						      	<input name='agregar' type='submit' id='accionform' value='Agregar'>";
						      	
						    	
						    echo"</div>
						  </form>
						</div>
						
				   </div>
				   <div class='right'>
				   
				   	<div class='tbl-header'>
					    <table cellpadding='0' cellspacing='0' border='0'>
					      <thead>
					        <tr>
					          <th style='color:#fff; width:211px;'></th>
					          <th style='color:#fff; width:431px; text-align:center;'>nombre</th>
					          <th style='color:#fff; width:111px;'></th>
					        </tr>
					      </thead>
					    </table>
					  </div>
					  <div class='tbl-content' style='height:450px;'>
					    <table cellpadding='0' cellspacing='0' border='0'>
					      <tbody>";
					      $consulta=mysqli_query($linck,"SELECT * FROM `categorias` WHERE `id_propietario`='$aidi' ORDER BY `id_categoria`;");
					      while ($row = mysqli_fetch_array($consulta)){
					      	echo"
					            <tr class='cuerpo'>
						            <td style='width:211px;'><center><button style='width: 6em; padding: 1em; color: black; background-color: #F4D03F; border: none; border-radius: 3px;'>Editar</button></center></td>
						            <td style='width:431px;'><center>".$row['nombre']."</center></td>
						            <td style='width:110px;'><center><a href='agregarCategorias.php?id=".$row['id_categoria']."'>
						            <img src='../../img/cancelar.png' id='cancelar' height='20em' width='20em'></a></center></td>
					            </tr>";
					         }
					 echo"
					 </tbody>
					    </table>
					  </div>
			
				   </div>
				   
			</div>

</body>";

mysqli_close($linck);
?>

</html>