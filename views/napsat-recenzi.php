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
        color: red;
        margin-bottom: 10px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="number"],
    textarea {
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
    if (!isset($slug)) {
        header("Location: /");
        exit();
    }

    if (isset($_GET["error"])) {
        
        if ($_GET["error"] == 1) {
            echo "<p class='error-message'>Něco se pokazilo, zkuste to znovu.</p>";
        } else if ($_GET["error"] == 2) {
            echo "<p class='error-message'>Hodnocení musí být v rozmezí 1-5.</p>";
        } else if ($_GET["error"] == 3) {
            echo "<p class='error-message'>Text nesmí být prázdný.</p>";
        }
    }
    ?>

    <form method="post">
        <label for="recenze">Hodnocení (x/5)</label>
        <input id="recenze" name="recenze" type="number" min="1" max="5" required>

        <label for="text">Text</label>
        <textarea name="text" id="text" cols="30" rows="10" required></textarea>

        <input type="submit" value="Odeslat">
    </form>
</div>
</div>