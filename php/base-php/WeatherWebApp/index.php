<?php
include './php/weatherData.php';
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
        <div class="card card--main">
          <?php
          if ($city) {
            echo '<img class="card__image" src="' . $image . '" alt="weather description">
            <div class="card__background"></div>
            <div class="card__left">
              <h2 class="card__left__degree">' . $city['temperature'] . ' &#8451;</h2>
              <h3 class="card__left__city">' . $city['name'] . ', ' . $city['country'] . '</h3>
            </div>
            <div class="card__right">
              <h3 class="card__right__timezone">' . $city['timezone'] . '</h3>
              <h3 class="card__right__description">' . $city['descriptoin'] . '</h3>
            </div>';
          } else if ($error) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
          }
          ?>
        </div>
        <div class="description">
          <div class="description__left">
            <div class="card description__left__upper">
              <div class="description__left__upper__row">
                <div>
                  <span><img src="./assets/icons/drop.png" alt="humidity" /></span>
                  <span>
                    <p>humidity</p>
                    <p><?php echo $city['humidity'] ?>%</p>
                  </span>
                </div>
                <div>
                  <span><img src="./assets/icons/visibility.png" alt="humidity" /></span>
                  <span>
                    <p>Visibility</p>
                    <p><?php echo $city['visibility'] ?> km</p>
                  </span>
                </div>
                <div>
                  <span><img src="./assets/icons/sunset.png" alt="sunset" /></span>
                  <span>
                    <p>sunset</p>
                    <p><?php echo $city['sunset'] ?> </p>
                  </span>
                </div>
              </div>
              <div class="description__left__upper__row">
                <div>
                  <span><img src="./assets/icons/wind.png" alt="wind" /></span>
                  <span>
                    <p>wind speed</p>
                    <p><?php echo $city['wind'] ?> m/s</p>
                  </span>
                </div>
                <div>
                  <span><img src="./assets/icons/wind-direction.png" alt="wind" /></span>
                  <span>
                    <p>direction</p>
                    <p><?php echo $city['deg'] ?>&deg;</p>
                  </span>
                </div>
                <div>
                  <span><img src="./assets/icons/sunrise.png" alt="sunrise" /></span>
                  <span>
                    <p>sunrise</p>
                    <p><?php echo $city['sunrise'] ?></p>
                  </span>
                </div>
              </div>
            </div>
            <div class="card description__left__lower">
              <div>
                <p>Pressure</p></br>
                <p><?php echo $city['pressure'] ?> hpa</p>
              </div>
              <div>
                <p>Feels like</p></br>
                <p><?php echo $city['feels'] ?> &#8451;</p>
              </div>
              <div>
                <p>Cloud coverage</p></br>
                <p><?php echo $city['clouds'] ?>%</p>
              </div>
            </div>
          </div>
          <div class="card description__right">
            <h3>Dayly and Hourly Temperatures</h3>
            <img class="description__right__chart" src="./assets/images/chart.png" alt="chart">
            <div class="description__right__daily">
              <div>
                <h3>MON</h3>
                <img src="./assets/weatherIcons/cloudy.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>TUE</h3>
                <img src="./assets/weatherIcons/cloud.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>WED</h3>
                <img src="./assets/weatherIcons/rain.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>THU</h3>
                <img src="./assets/weatherIcons/rainy.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>FRI</h3>
                <img src="./assets/weatherIcons/thunderstorm.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>SAT</h3>
                <img src="./assets/weatherIcons/rainy.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
              <div>
                <h3>SUN</h3>
                <img src="./assets/weatherIcons/cloudy.png" alt="chart">
                <p>11 &#8451;</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include './components/footer.php';
  ?>
  <script src="./javascript/script.js"></script>
</body>

</html>