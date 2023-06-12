<?php
use Steampixel\Route;
Route::add('/admin/novy_film', function () {
    if (!Admin::overeni()) {
        header("Location: /");
        exit();
    }
    $input = $_POST;
    if(!isset($_FILES['poster'])){
        header("Location: /admin/novy_film?error=6");
        exit();
    }
    if($_FILES['poster']['error'] != 0){
        header("Location: /admin/novy_film?error=1");
        exit();
    }
    if (!isset($input["nazev"]) || !isset($input["rok"]) || !isset($input["popis"]) || !isset($input["delka"]) || !isset($input["zanry"])) {
        header("Location: /admin/novy_film?error=2");
        exit();
    }
    if (empty($input["nazev"]) || empty($input["rok"]) || empty($input["popis"]) || empty($input["delka"]) || empty($input["zanry"])) {
        header("Location: /admin/novy_film?error=2");
        exit();
    }
    if (!is_numeric($input["rok"]) ) {
        header("Location: /admin/novy_film?error=3");
        exit();
    }
    if (!is_numeric($input["delka"]) ) {
        header("Location: /admin/novy_film?error=4");
        exit();
    }
    if (!is_string($input["popis"]) ) {
        header("Location: /admin/novy_film?error=5");
        exit();
    }
    $uploadedFile = $_FILES['poster'];
    $extension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

    $randomName = uniqid() . '.' . $extension;

    $uploadPath = $_SERVER["DOCUMENT_ROOT"] . '/images/' . $randomName;

    while (file_exists($uploadPath)) {
        $randomName = uniqid() . '.' . $extension;
        $uploadPath = $_SERVER["DOCUMENT_ROOT"] . '/images/' . $randomName;
    }
    if (!move_uploaded_file($uploadedFile['tmp_name'], $uploadPath)) {
        header("Location: /novy_film?error=1");
        exit();
    }
    $input["poster"] = $randomName;

    $film = json_decode(Film::novy_film($input), true);
    if ($film["status"] == "ok") {
        header("Location: /film/" . $film["slug"]);
    } else {
        header("Location: /admin/novy_film?error=2");
    }

}, 'post');

Route::add('/admin/novy_film', function () {
    if (!Admin::overeni()) {
        header("Location: /");
        exit();
    }
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/novy_film.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";

});

Route::add('/admin/filmy',function(){
    if (!Admin::overeni()) {
        header("Location: /");
        exit();
    }
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/admin_filmy.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";
});

Route::add('/admin/film/([a-zA-Z0-9-]+)/odstranit',function($slug){
    $response = Film::odstranit($slug);
    if(isset($response["status"])){
        if($response["status"] == "ok"){
            header("Location: /admin/filmy?success=1");
            exit();
        }else{
            header("Location: /admin/filmy?error=1");
            exit();
        }
    }else{
        header("Location: /admin/filmy?error=1");
        exit();
    }
});
