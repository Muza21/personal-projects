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
        <div class="description">
          <div class="card card--text">
            <h2 class="card__title">About Our Weather App</h2>
            <p class="card__text">Welcome to our comprehensive weather app! Designed to be your one-stop solution for weather information and daily planning, our app combines accurate weather data from the OpenWeather API with powerful features to help you stay organized and prepared.</p>
          </div>
          <div class="card card--text">
            <h2 class="card__title">Real-time Weather Updates</h2>
            <p class="card__text">Stay informed about the latest weather conditions in your area and around the world. Our app fetches real-time data from the OpenWeather API to provide you with accurate temperature, humidity, wind speed and direction, precipitation chances, and more. Whether you're planning a trip, heading out for a hike, or simply curious about the weather, we've got you covered.</p>
          </div>

          <div class="card card--text">
            <h2 class="card__title">Hourly and Extended Forecasts</h2>
            <p class="card__text">Plan your day effectively with our detailed hourly and extended forecasts. Our app provides you with hour-by-hour weather predictions, allowing you to anticipate temperature changes, rain or snowfall, and other key elements throughout the day. Additionally, you can access extended forecasts to make informed decisions about the week ahead.</p>
          </div>

          <div class="card card--text">
            <h2 class="card__title">Daily Planner and To-Do List</h2>
            <p class="card__text">Take charge of your day with our integrated planner and to-do list. Seamlessly merge your weather information with your daily tasks and activities. Plan your schedule accordingly, whether it's scheduling outdoor workouts, planning trips, or organizing events. Stay on top of your commitments while considering the weather conditions that may impact your plans.</p>
          </div>

          <div class="card card--text">
            <h2 class="card__title">Cross-Platform Access</h2>
            <p class="card__text">Access our weather app seamlessly across multiple platforms. Whether you prefer to use it on your desktop, tablet, or mobile device, we offer a consistent experience across all platforms. Sync your data and preferences across devices, ensuring you're always up to date, no matter where you are.</p>
          </div>

          <div class="card card--text">
            <h2 class="card__title">Support and Feedback</h2>
            <p class="card__text">We're committed to providing you with an exceptional experience. If you have any questions, encounter issues, or have suggestions for improving our app, our dedicated support team is here to assist you. Your feedback is invaluable in helping us refine and enhance our app to better meet your needs.</p>

            <p class="card__text">Thank you for choosing our weather app. We hope it becomes your go-to tool for weather information, planning your day, and staying prepared for any conditions.</p>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include './components/footer.php';
  ?>
</body>

</html>