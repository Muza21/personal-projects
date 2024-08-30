<?php
foreach ($city['0']['hour'] as $hour => $data) {
    $dateTime = new DateTime($data['time']);
    $hours = $dateTime->format('H');
    $minutes = $dateTime->format('i');
    echo   '<div class="card description__card">
                <img class="card__image" src="./assets/weatherPics/' . $data['condition']['text'] . '.jpg" alt="weather description">
                <div class="card__background"></div>
                <div class="card__left">
                    <h2 class="card__left__degree">' . round($data['feelslike_c']) . ' &#8451;' . '</h2>
                    <h3 class="card__left__description">' . $data['condition']['text'] . '</h3>
                    <h3 class="card__left__day">' .  $hours . ':' . $minutes .  '</h3>
                </div>
            </div> ';
}
