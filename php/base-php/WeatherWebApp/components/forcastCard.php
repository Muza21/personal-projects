<?php
foreach ($city as $day => $data) {
    $dateTime = new DateTime($data['date']);
    $month = $dateTime->format('M');
    $day = $dateTime->format('d');
    echo '<div class="card description__card">
              <img class="card__image" src="./assets/weatherPics/' . $data['day']['condition']['text'] . '.jpg" alt="weather description">
              <div class="card__background"></div>
              <div class="card__left">
                  <h2 class="card__left__degree">' . round($data['day']['avgtemp_c']) . ' &#8451;' . '</h2>
                  <h3 class="card__left__day">' . $day . ' ' . $month . '</h3>
                  <h3 class="card__left__description">' . $data['day']['condition']['text'] . '</h3>
              </div>
          </div>';
}
