<?php
$searchValue = isset($_COOKIE['city']) ? $_COOKIE['city'] : 'Tbilisi';

if (isset($_GET['city']) ?? false) {
    $urlContents = file_get_contents("http://api.weatherapi.com/v1/forecast.json?key=ffaab1f3839c463f8cb70716231806&q=" . urlencode($_GET['city']) . "&days=14&aqi=no&alerts=no");
    $weatherArray = json_decode($urlContents, true);
    setcookie('city', $_GET['city'], time() + (86400 * 30), '/');
} elseif (!isset($_GET['city'])) {
    setcookie('city', $searchValue, time() + (86400 * 30), '/');

    $urlContents = file_get_contents("http://api.weatherapi.com/v1/forecast.json?key=ffaab1f3839c463f8cb70716231806&q=" . $searchValue . "&days=14&aqi=no&alerts=no");
    $weatherArray = json_decode($urlContents, true);
}
$city = $weatherArray['forecast']['forecastday'];
