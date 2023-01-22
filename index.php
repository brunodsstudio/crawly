<?php
ini_set('display_errors', 1);
require 'app/bootstrap.php';
$a = new app\Crawly\Crawly;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crawly</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  </br></br></br>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-6">

      <div class="card" style="width: 18rem;">

      <div class="card-body">
        <h2 class="card-title">Crawly - teste</h2>
        <p class="card-text">
          <?php 

              $resp = $a->getAnswer();
              if(isset($resp)){

                echo "Token Original</br><span>" . $resp[2]. "</span><br>";
                echo "Token Reverso</br><span>" . $resp[1]. "</span><br>";
                echo $resp[0];

              }
            
          ?>
          </p>
      
      </div>
</div>
        
          
         
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
