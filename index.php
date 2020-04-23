<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' href='css/formularios.css' />
    <link rel='stylesheet' type='text/css' href='css/consulta.css' />

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
    body {
    	background-color: #F4D03F;
		font-size: 16px;
		font-family: sans-serif;
    }
</style>
	
	<title>ORDENA</title>
	<h1>
	</h1>
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
?>
<body>
	<div class='container' style='max-width:65em;'>

		<div style='position:relative; float:right; text-align:center;'><br><br><br><br><br><img src="img/logo.jpeg"></div>

		<div style="width: 20em;">
			<center><h2>Inicia Sesión</h2></center>
			<form action="index.php" method="post">
	            <input type="text" name="user" placeholder="&#128100; Email" required autofocus><br><br>
	            <input type="password" name="contra" placeholder="&#x1F512; Contraseña" required><br><br>
	            <center><input type="submit" name="inicio" style="width: 10em; padding: 1em; background-color: black; color: white;" value="ENTRAR"><br><br>
	            <a href="" style="text-decoration: none; color: #F4D03F"><b>Olvidaste la contraseña?</b></a></center>
	        </form>
	    </div><br><br>
	    <div style="margin-left: auto; margin-right: auto; width: 28em; color: white; background-color: black; padding: 20px; border-radius: 50px;">
	    	<p>Aún no tienes una cuenta?</p>
	    	<p>Regístrate ahora y comienza a trabajar con el mejor software
	    	para administrar bares y restaurantes en el mundo!</p>
	    	<center><button style="width: 10em; padding: 1em; color: black; background-color: #F4D03F; border: none; border-radius: 3px;" onclick="window.location.href = 'registro.php'">Registrarse</button></center>
	    </div>

	</div>
	<?php
	if(isset($_POST['inicio'])){
		if(isset($_POST['user']) AND isset($_POST['contra'])) {
			$sql="SELECT * FROM `propietarios`";
			$rec=mysqli_query($linck,$sql);
		    $recx=mysqli_query($linck,$sql);
			$verificar_usuario=0;
		    $verificar_contrasena=0;
		    $bnd=0;
			$usuary=$_POST['user'];
		    if($bnd==0){
			    while($result=mysqli_fetch_object($rec)){
			    	if($result->nombre==$usuary){
			    		$verificar_usuario=1;
			            $bnd=1;
			    	}
			    }
		    }
		    if($bnd==0){
		        $usuary=strtolower($usuary);
			    while($resultx=mysqli_fetch_object($recx)){
			        if($resultx->email==$usuary){
			            $verificar_usuario=1;
			        }
			    }
		    }
		    if($verificar_usuario==1){
		        $passwd=$_POST['contra'];
		        $consulta2=mysqli_query($linck,"SELECT * FROM `propietarios` ORDER BY id_propietario;");
		        while($row = mysqli_fetch_array($consulta2)){
			        if($row['password']==$passwd){
			            $verificar_contrasena=1;
			            $aidi = $row['id_propietario'];
			        }
			    }
		    	if($verificar_contrasena==1){
				        session_start();
				        $_SESSION['id'] = $aidi;
				        $_SESSION['user']=$usuary;
				         header("location: Inicio/inicio.php");
		    	}
		    	else{
			        echo "<script language='javascript'>"; 
					echo "alert('La contraseña es incorrecta.')"; 
					echo "</script>";
			    }
		    }
		    else{
		        echo "<script language='javascript'>";
				echo "alert('No se ha encontrado el restaurante o correo electrónico indicado.')";
				echo "</script>";
			}
		}
		else{
	    	echo "<script language='javascript'>"; 
			echo "alert('Porfavor rellene todos los campos.')"; 
			echo "</script>";
		}
	}
	mysqli_close($linck);
	?>
</body>
</html>
