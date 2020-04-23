<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Detalles de pago</title>
</head>
<body>

  <?php
  if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) && !empty($_GET['propri']) ){
          $paymentID = $_GET['paymentID'];
          $payerID = $_GET['payerID'];
          $token = $_GET['token'];
          $pid = $_GET['pid'];
          $propri = $_GET['propri'];
          ?>

          <link rel='stylesheet' type='text/css' href='../css/formularios.css' />
          <link rel='stylesheet' type='text/css' href='../css/menu.css' />
          <link rel='stylesheet' type='text/css' href='../css/consulta.css' />

          <div class='container' style='max-width: 35em; margin-top: 100px;'>
            <div class="alert alert-success">
              <strong>Éxito!</strong> Su pago ha sido procesado correctamente.
            </div><br>
            <center>Id de pago:  <?php echo $paymentID; ?></center>
            <center>Id de cliente: <?php echo $payerID; ?></center>
            <center>Fecha: <p id='date'></p><script>
                  document.getElementById('date').innerHTML = Date();
                  </script></center>
            <center>pagado: <?php echo $propri; ?></center>
            <br><center><button onclick="window.location.href='Checkout.php'">Regresar</button></center>
          </div>
      <?php   
      } else {
          header('Location:Checkout.php');
      }
  ?>

</body>
</html>