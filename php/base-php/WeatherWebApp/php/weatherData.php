<?php
$city = "";
$error = "";

$searchValue = isset($_COOKIE['city']) ? $_COOKIE['city'] : 'Tbilisi';

if (isset($_GET['city']) ?? false) {
  $urlContents = file_get_contents("http://api.weatherapi.com/v1/forecast.json?key=ffaab1f3839c463f8cb70716231806&q=" . urlencode($_GET['city']) . "&days=1&aqi=no&alerts=no");
  // $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($_GET['city']) . "&appid=e2d7484f4918908e6b7fd835c19c5660");

  $weatherArray = json_decode($urlContents, true);
  setcookie('city', $_GET['city'], time() + (86400 * 30), '/');
} elseif (!isset($_GET['city'])) {
  setcookie('city', $searchValue, time() + (86400 * 30), '/');

  $urlContents = file_get_contents("http://api.weatherapi.com/v1/forecast.json?key=ffaab1f3839c463f8cb70716231806&q=" . $searchValue . "&days=1&aqi=no&alerts=no");
  // $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=" . $searchValue . "&appid=e2d7484f4918908e6b7fd835c19c5660");

  $weatherArray = json_decode($urlContents, true);
}
$localtime = DateTime::createFromFormat('Y-m-d H:i', $weatherArray['location']['localtime']);
$formattedDate = $localtime->format('j M H:i');
// var_dump($weatherArray);
$city = array(
  "name" => $weatherArray['location']['name'],
  "country" => $weatherArray['location']['country'],
  "descriptoin" => $weatherArray['current']['condition']['text'],
  "temperature" => round($weatherArray['current']['temp_c']),
  "wind" => round((($weatherArray['current']['wind_kph'] * 1000) / 3600), 2),
  "deg" => $weatherArray['current']['wind_degree'],
  "humidity" => $weatherArray['current']['humidity'],
  "timezone" => $formattedDate,
  "sunrise" => $weatherArray['forecast']['forecastday'][0]['astro']['sunrise'],
  "sunset" => $weatherArray['forecast']['forecastday'][0]['astro']['sunset'],
  "pressure" => $weatherArray['current']['pressure_mb'],
  "visibility" => $weatherArray['current']['vis_km'],
  "clouds" => $weatherArray['current']['cloud'],
  "feels" => $weatherArray['current']['feelslike_c'],
);
$image = "./assets/weatherPics/" . $city["descriptoin"] . ".jpg";


  // $city = array(
  //   "name" => $weatherArray['name'],
  //   "descriptoin" => $weatherArray['weather'][0]['description'],
  //   "temperature" => $tempInCelcius,
  //   "wind" => $weatherArray['wind']['speed'],
  //   "deg" => $weatherArray['wind']['deg'],
  //   "country" => $weatherArray['sys']['country'],
  //   "humidity" => $weatherArray['main']['humidity'],
  //   "timezone" => $timezoneOffsetHours,
  //   "sunrise" => date('H:i', $weatherArray['sys']['sunrise']),
  //   "sunset" => date('H:i', $weatherArray['sys']['sunset']),
  //   "pressure" => $weatherArray['main']['pressure'],
  //   "visibility" => $weatherArray['visibility'] / 1000,
  //   "clouds" => $weatherArray['clouds']['all'],
  //   "feels" => intval($weatherArray['main']['feels_like'] - 273),
  // );
  // $image = "./assets/weatherPics/" . $city["descriptoin"] . ".jpg";
