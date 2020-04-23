<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
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
	   	<li class='menu-item' style='background-color:#000'><a href='ventas.php' style='color:#fff'>Ventas</a></li>
	   	<li class='menu-item'><a href='../Meseros/agregarMeseros.php'>Meseros</a></li>
	   	<li class='menu-item'><a href='../Mesas/mesas.php'>Mesas</a></li>
	   	<li class='menu-item'><a href='../Menu/mainMenu.php'>Menú</a></li>
	   	<li class='menu-item'><a href='../Paypal/Checkout.php'>Usuario</a>
		  
		</li>
	  </ol>
	</nav>

			<div class='container_base'>
				    <div class='center'>
				   		<div class='container' style='max-width:65em;'>
						  <center><h3>Ventas realizadas</h3></center>
				   
				   	<div class='tbl-header' style='height:50px; width:800px;'>
					    <table cellpadding='0' cellspacing='0' border='0'>
					      <thead>
					        <tr>
					          <th style='color:#fff; width:80px;'>Cantidad</th>
					          <th style='color:#fff; width:300px;'>Productos</th>
					          <th style='color:#fff; width:80px;'>Total</th>
						      <th style='color:#fff; width:140px;'>Mesero</th>
					          <th style='color:#fff; width:200px;'>Fecha</th>
					        </tr>
					      </thead>
					    </table>
					  </div><!--cierra tblheader-->


					  <div class='derecha' style='width:200px; border:1px solid black; position:relative; float:right; text-align:center;'>
					  <h4>Filtrar por:</h4>
					  <button class='taggs' onclick='funcionEsconder()'>Mesero</button><br><br>
					  <div class='seleccion' style='width:200px; height:50px;'>
									<select style='position:relative; left:0em; font-size:10px;' name='adiosvaquero'>
									<option selected value='0'> Selecciona al mesero </option>";
									$consulta2=mysqli_query($linck,"SELECT * FROM `meseros` WHERE `id_propietario`='$aidi' ORDER BY id_mesero;");
								      while ($row = mysqli_fetch_array($consulta2)){
								      	echo"
								      	<option value='".$row['id_mesero']."'>".$row['nombre']."</option>";
								        }
									echo"</select>
					   </div>
					   <div class='cola'>
					   <button class='taggs' style='background-color:black;'>Aplicar</button>
					   </div>
					  </div><!--cierra derecha-->

					  <script>
					function funcionEsconder() {
					  var x = document.getElementById('seleccion');
					  if (x.style.display === 'none') {
					    x.style.display = 'block';
					  } else {
					    x.style.display = 'none';
					  }
					}
					</script>


					  <div class='tbl-content' style='height:400px; width:800px;'>
					    <table cellpadding='0' cellspacing='0' border='0'>
					      <tbody>";
					      $consulta=mysqli_query($linck,"SELECT * FROM `ventas` WHERE `id_propietario`='$aidi' ORDER BY id_venta;");
					      if($consulta != null){
					      $idvenant = 100000;
					      while ($row = mysqli_fetch_array($consulta)){
					      	$idvennue = $row['id_venta'];
					      	if($idvennue != $idvenant && $idvenant != 100000){
					      			echo"<tr class='cuerpo'>";
					      			echo"<td style='width:120px'><center>";
					      			for($i = 0; $i < sizeof($arrcan); $i++){
									  echo $arrcan[$i]; echo"<br>";
									  if($i == sizeof($arrcan)-1){
									  	echo"<br><br>";
									  }
									}
									echo"</center></td>";
									echo"<td style='width:300px'><center>";
					      			for($i = 0; $i < sizeof($arrprodu); $i++){
									  echo $arrprodu[$i]; echo"<br>";
									  if($i == sizeof($arrprodu)-1){
									  	echo"<br><br>";
									  }
									}
									echo"</center></td>";
									echo"<td style='width:80px'><center>";
					      			for($i = 0; $i < sizeof($arrtotal); $i++){
					      				$totcuen = $totcuen + $arrtotal[$i];
									  echo"$".$arrtotal[$i]; echo"<br>";
									  if($i == sizeof($arrtotal)-1){
									  	echo"----------<br>"; echo "$".$totcuen;
									  }
									}
									echo"</center></td>";
									$consulta2=mysqli_query($linck,"SELECT * FROM `meseros` WHERE id_mesero = '$numnom' AND `id_propietario`='$aidi';");
					      			while($row2 = mysqli_fetch_array($consulta2)){
					      				echo"<td style='width:140px'><center>".$row2['nombre']."</center></td>";
					      			}
					      			echo"<td style='width:200px'><center>".$fech."</center></td>";

									echo"</tr>";
									unset($arrcan);
									unset($arrtotal);
									unset($arrprodu);
					      	}
					      	$arrcan[] = $row['cantidad'];
					      	$arrtotal[] = 150;
					      	$arrprodu[] = $row['produ'];
					      	$numnom = $row['id_mesero'];
					      	$fech = $row['fecha'];
					      	$totcuen = 0;

					      	$idvenant = $idvennue;
					      }
					      echo"<tr class='cuerpo'>";
					      			echo"<td style='width:120px'><center>";
					      			for($i = 0; $i < sizeof($arrcan); $i++){
									  echo $arrcan[$i]; echo"<br>";
									  if($i == sizeof($arrcan)-1){
									  	echo"<br><br>";
									  }
									}
									echo"</center></td>";
									echo"<td style='width:300px'><center>";
					      			for($i = 0; $i < sizeof($arrprodu); $i++){
									  echo $arrprodu[$i]; echo"<br>";
									  if($i == sizeof($arrprodu)-1){
									  	echo"<br><br>";
									  }
									}
									echo"</center></td>";
									echo"<td style='width:80px'><center>";
					      			for($i = 0; $i < sizeof($arrtotal); $i++){
					      				$totcuen = $totcuen + $arrtotal[$i];
									  echo"$".$arrtotal[$i]; echo"<br>";
									  if($i == sizeof($arrtotal)-1){
									  	echo"----------<br>"; echo "$".$totcuen;
									  }
									}
									echo"</center></td>";
									$consulta2=mysqli_query($linck,"SELECT * FROM `meseros` WHERE id_mesero = '$numnom' AND `id_propietario`='$aidi';");
					      			while($row2 = mysqli_fetch_array($consulta2)){
					      				echo"<td style='width:140px'><center>".$row2['nombre']."</center></td>";
					      			}
					      			echo"<td style='width:200px'><center>".$fech."</center></td>";

									echo"</tr>";
									unset($arrcan);
									unset($arrtotal);
									unset($arrprodu);
						 }
					 echo"
					 </tbody>
					    </table>
					  </div><!--cierra tblcontent-->
					  ";

						echo"</div><!--cierra container-->
						
				    </div><!--cierra center-->
				   
			</div><!--cierra container base-->

</body>";

mysqli_close($linck);
?>

</html>