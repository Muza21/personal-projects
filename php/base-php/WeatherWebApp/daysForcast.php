<?php
include './php/forcastWeather.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <title>Weather App</title>
  <script src="./javascript/script.js"></script>
</head>

<body>
  <?php
  include './components/header.php';
  ?>
  <main class="content">
    <div class="promo_wrapper">
      <div class="center">
        <?php
        include './components/search.php';
        ?>
        <div class="description description__forcast">
          <?php

          include './components/forcastCard.php';
          ?>
        </div>
      </div>
    </div>
  </main>
  <?php
  include './components/footer.php';
  ?>
</body>

</html>