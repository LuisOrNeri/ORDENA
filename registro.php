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
<title>Crear Cuenta</title>
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
?>

<body>
<div class='container' style='max-width:40em;'>
    <center><img src='img/logo.jpeg'></center>
    <div style='width: 20em;  margin-left: auto; margin-right: auto;'>
        <center>
        <h2>Regístrate</h2>
        <form action='registro.php' method='post'>
            <input class='input' type='email' name='correo' placeholder='&#9993;  Email' required autofocus><br><br>
            <input class='input' type='email' name='concorreo' placeholder='&#9993;  Confirmar email' required><br><br>
            <input class='input' type='password' name='contra' placeholder='&#x1F512;  Contraseña' required><br><br>
            <input class='input' type='text' name='usuario' placeholder='&#127860; Nombre del establecimiento' required><br><br>
            <select style='position: relative; left: 5%;' name='paquete'>
                <option selected value='0'> Selecciona el paquete </option>
                    <option value='1'>Básico</option>
                    <option value='2'>Premium</option>
            </select><br><br>
            <input type='checkbox' name='condiciones' required>Acepto los términos y condiciones.<br/><br><br>
            <div style='width: 17em;'>
                <input type='submit' name='registro' value='Crear cuenta' style='width: 10em; padding: 1em; background-color: black; color: white;'>
                <input type='reset' value='Deshacer' style='width: 7em; padding: 1em; float: right;'>
            </div>
        </form>
        </center>
    </div>
</div>
<?php 
if(isset($_POST['registro'])){
	if(!empty($_POST['correo']) OR !empty($_POST['concorreo']) OR !empty($_POST['contra']) OR !empty($_POST['usuario']) OR $_POST['paquete']!=0 ) {
	$sql="SELECT * FROM propietarios";
	$rec=mysqli_query($linck,$sql);
	$verificar_correo=0;
	$cor=$_POST['correo']; $cor=strtolower($cor);
    $cocor=$_POST['concorreo']; $cocor=strtolower($cocor);
    while($result=mysqli_fetch_object($rec)){
    	if($result->correo==$cor){
    		$verificar_correo=1;
    	}
    }
    if($verificar_correo==0){
    	if($cor==$cocor){
    		$usuario=$_POST['usuario'];
    		$password=$_POST['contra'];
            $pack=$_POST['paquete'];
            //$reg=mysql_query($linck,"INSERT INTO propietarios (`nombre`,`password`,`email`,`paquete`,`estado`) VALUES ('$usuario','$password','$cor','$pack','0');");
    		$sql="INSERT INTO `propietarios` (`nombre`,`password`,`email`,`paquete`,`estado`) VALUES ('$usuario','$password','$cor','$pack','1');";
    		$insertdata=mysqli_query($linck,$sql);
            ?>
            <script type="text/javascript">
alert("Usted se ha registrado exitosamente");
window.location.href='index.php';
</script>
        <?php
    	}
    	else{
            echo "<script language='javascript'>"; 
echo "alert('Los correos no coinciden, intente nuevamente.')"; 
echo "</script>";
    	}
    }
    else{
        echo "<script language='javascript'>"; 
echo "alert('Ya existe una cuenta con este correo.')";
echo "</script>";
    }
}
else{
    echo "<script language='javascript'>"; 
echo "alert('Porfavor rellene todos los campos.')";
echo "</script>";
}
}
 ?> 
</body>
</html>
