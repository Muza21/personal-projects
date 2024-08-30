<?php
session_start();
$_SESSION['activePage'] = $_SERVER['REQUEST_URI'];
function isActive($pageUrl)
{
    return ($_SESSION['activePage'] == $pageUrl) ? 'active' : '';
}
?>

<header class="header">
    <nav class="header__menu">
        <a id="header__link" href="./index.php">
            <h1><span><img class="header__image" src="./assets/icons/mainlogo.png" alt="cloud"></span>Weather</h1>
        </a>
        <div class="dropdown">
            <input type="checkbox" id="dropdown">

            <label class="dropdown__face" for="dropdown">
                <img src="./assets/icons/menu.png" alt="menu">
            </label>

            <ul class="dropdown__items">
                <li><a class="<?php echo isActive("//WeatherWebApp/index.php") ?>" href="./index.php">Home</a></li>
                <li><a class="<?php echo isActive("//WeatherWebApp/daysForcast.php") ?>" href="./daysForcast.php">Days Forcast</a></li>
                <li><a class="<?php echo isActive("//WeatherWebApp/hoursForcast.php") ?>" href="./hoursForcast.php">Hours Forcast</a></li>
                <li><a class="<?php echo isActive("//WeatherWebApp/plan.php") ?>" href="./plan.php">Plan Your Day</a></li>
                <li><a class="<?php echo isActive("//WeatherWebApp/about.php") ?>" href="./about.php">About Us</a></li>
            </ul>
        </div>
    </nav>
</header>