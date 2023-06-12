<?php
use Steampixel\Route;

Route::add('/api/filmy', function () {
    header('Content-Type: application/json');

    echo json_encode(Film::vyber_vsechny(), JSON_UNESCAPED_UNICODE);
});
Route::add('/api/recenze', function () {
    header('Content-Type: application/json');
    echo json_encode(Recenze::vyber_vsechny(), JSON_UNESCAPED_UNICODE);
});
Route::add('/api/recenze/([0-9]+)', function ($nazev) {
    header('Content-Type: application/json');
    $response = Recenze::vyber_u_filmu($nazev);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
});
Route::add('/api', function () {
    echo 'Welcome :-)';

    $sql = "SELECT * FROM `film`";

    $res = Databaze::query($sql);
    print_r($res);

});


