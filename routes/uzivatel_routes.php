<?php
    use Steampixel\Route;

Route::add('/', function () {
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/home.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";
});

Route::add('/login', function () {
    if (isset($_SESSION["id_uzivatel"])){
        header("Location: /");
        exit();
    }
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";
});
Route::add('/login',function(){
    if (isset($_SESSION["id_uzivatel"])){
        header("Location: /");
        exit();
    }
    if (isset($_POST["email"]) && isset($_POST["heslo"])){
        $email = $_POST["email"];
        $heslo = $_POST["heslo"];
        $uzivatel = Uzivatel::login($email,$heslo);
        if ($uzivatel["status"] == "ok"){
            $_SESSION["id_uzivatel"] = $uzivatel["id"];
            $_SESSION["prezdivka"] = $uzivatel["prezdivka"];
            $_SESSION["role"] = $uzivatel["role"];
            header("Location: /");
            exit();
        }else{
            header("Location: /login?error=1");
            exit();
        }
    }
},'post');

Route::add('/registrace', function () {
    if (isset($_SESSION["id_uzivatel"])){
        header("Location: /");
        exit();
    }
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/registrace.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";
});
Route::add('/logout',function(){
    if (isset($_SESSION["id_uzivatel"])){
        session_destroy();
        header("Location: /");
        exit();
    }else{
        header("Location: /");
        exit();
    }
});

Route::add('/registrace', function () {
    if (isset($_SESSION["id_uzivatel"])) {
        header("Location: /");
        exit();
    }
    if (isset($_POST["email"]) && isset($_POST["heslo"]) && isset($_POST["prezdivka"])) {
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)||strlen($email)>50){
            header("Location: /registrace?error=4");
            exit();
        }
        if(strlen($_POST["prezdivka"])>30){
            header("Location: /registrace?error=5");
            exit();
        }
        $heslo = $_POST["heslo"];
        $prezdivka = $_POST["prezdivka"];
        $uzivatel = Uzivatel::registrace($email, $heslo, $prezdivka);
        if ($uzivatel["status"] == "ok") {
            header("Location: /login");
            exit();
        } else {
            $error = $uzivatel["error"];
            if($error == "email"){
                header("Location: /registrace?error=2");
                exit();
            }
            if($error == "prezdivka"){
                header("Location: /registrace?error=3");
                exit();
            }
            header("Location: /registrace?error=1");
            exit();
        }
    }

},'post');

Route::add('/film/([a-zA-Z0-9-]+)', function ($nazev) {
    require $_SERVER["DOCUMENT_ROOT"]."/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"]."/views/zobrazeni_film.php";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/user_footer.phtml";
});

Route::add('/film/([a-zA-Z0-9-]+)/napsat-recenzi', function ($slug) {
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_header.phtml";
    require $_SERVER["DOCUMENT_ROOT"] . "/views/napsat-recenzi.php";
    require $_SERVER["DOCUMENT_ROOT"] . "/templates/user_footer.phtml";
});

Route::add('/film/([a-zA-Z0-9-]+)/napsat-recenzi', function ($slug) {
    if (isset($_POST["recenze"])){
        $hodnoceni = $_POST["recenze"];
        $text = $_POST["text"];
        if ($hodnoceni < 1 || $hodnoceni > 5){
            header("Location: /film/$slug/napsat-recenzi?error=2");
            exit();
        }
        if ($text == ""){
            header("Location: /film/$slug/napsat-recenzi?error=3");
            exit();
        }

        $resoult = Recenze::vytvor_recenzi($text, $hodnoceni, $slug);
        if ($resoult["status"] == "ok"){
            header("Location: /film/$slug");
            exit();
        }else{
            $_POST = array();
            header("Location: /film/$slug/napsat-recenzi?error=1");
        }

    }else{
        header("Location: /film/$slug/napsat-recenzi?error=1");
        exit();
    }
},'post');
