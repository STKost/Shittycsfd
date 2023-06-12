<style>
    .body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .error-message {
        color: #d8000c;
        font-weight: bold;
        margin-bottom: 10px;
    }

    form {
        margin-top: 20px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<div class="body">
<div class="container">
    <?php
    if (!Admin::overeni()) {
        header("Location: /");
        exit();
    }
    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 1:
                echo "<div class='error-message'>Chyba při nahrávání obrázku</div>";
                break;
            case 2:
                echo "<div class='error-message'>Nebyly vyplněny všechny údaje</div>";
                break;
            case 3:
                echo "<div class='error-message'>Rok musí být číslo</div>";
                break;
            case 4:
                echo "<div class='error-message'>Délka musí být číslo</div>";
                break;
            case 5:
                echo "<div class='error-message'>Popis musí být řetězec</div>";
                break;
            case 6:
                echo "<div class='error-message'>Nebyl vybrán obrázek</div>";
                break;
        }
    }
    ?>

    <form id="film" method="post" enctype="multipart/form-data">
        <input type="text" name="nazev" placeholder="Název" required>
        <input type="text" name="rok" placeholder="Rok" required>
        <input type="text" name="popis" placeholder="Popis" required>
        <input type="text" name="delka" placeholder="Délka" required>
        <input type="text" name="zanry" placeholder="Žánry" required>
        <input type="file" name="poster" id="poster" required>
        <input type="submit" value="Odeslat">
    </form>
</div>
</div>