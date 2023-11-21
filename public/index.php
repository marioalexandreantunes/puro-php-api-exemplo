<?php

require_once '../inc/config.php';
require_once '../inc/api.php';

$cookie_name = "theme";
$cookie_value = "dark";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  
$days = 5;
$city = "Lisbon";

$results = Api::get($city, $days);

if($results['status'] == 'error'){
    echo $results['messages'];
    exit;
}

$data = json_decode($results['data'], true);
$location = [];
$location['name'] = $data['location']['name'];
$location['region'] = $data['location']['region'];
$location['country'] = $data['location']['country'];
$location['current_time'] = $data['location']['localtime'];

$current = [];
$current['info'] = 'Neste momento:';
$current['temperature'] = $data['current']['temp_c'];
$current['condition'] = $data['current']['condition']['text'];
$current['condition_icon'] = $data['current']['condition']['icon'];

$forecast = [];
foreach($data['forecast']['forecastday'] as $day){
    $forecast_day = [];
    $forecast_day['info'] = null;
    $forecast_day['date'] = $day['date'];
    $forecast_day['condition'] = $day['day']['condition']['text'];
    $forecast_day['condition_icon'] = $day['day']['condition']['icon'];
    $forecast_day['max_temp'] = $day['day']['maxtemp_c'];
    $forecast_day['min_temp'] = $day['day']['mintemp_c'];
    $forecast[] = $forecast_day;
}

?>

<!doctype html>
<html lang="en" data-bs-theme="<?= $_COOKIE["theme"] ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tempo <?= $location['region'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <p class="display-4 fw-lighter mt-4">Tempo para a cidade <strong> <?= $location['region'] ?></strong></p>
        <hr>
        <div class="row m-3 justify-content-center text-center">
            <p class="display-6 fw-lighter">agora</p>
            <div class="col-sm-3 border border-primary rounded-1 text-center p-3">
                <img src="<?= $current['condition_icon']?>" alt="">
                <p class="fw-lighter"><?= $location['current_time']?></p>
                <hr class="mx-5">
                <p><?= $current['temperature']?>° max</p>
                <p><?= $current['condition']?></p>
            </div>
        </div>
        <div class="row m-3 justify-content-center">
            <!-- forecast -->
            <?php foreach($forecast as $day) : ?>
            <div class="col-sm-2 border border-warning m-2 rounded-1 text-center p-3">
                <img src="<?= $day['condition_icon'] ?>">
                <h3 class="fw-lighter"><?= $day['condition'] ?></h3>
                <div class="text-center">
                    <p class="fw-light"><?= $day['date'] ?></p>
                </div>
                <hr class="mx-5">
                <div class="text-center">
                    <p class="fw-lighter">máxima: <?= $day['max_temp'] ?>&deg;</p>
                    <p class="fw-lighter">mínima: <?= $day['min_temp'] ?>&deg;</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>