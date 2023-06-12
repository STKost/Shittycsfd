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

    p.error-message {
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

    input[type="email"],
    input[type="password"],
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    a#ioejo {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }
</style>
<div class="body">
<div class="container">
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == 1) {
            echo "<p class='error-message'>Máte chybu v údajích</p>";
        }
        if ($_GET["error"] == 2) {
            echo "<p class='error-message'>Váš email je již zabraný</p>";
        }
        if ($_GET["error"] == 3) {
            echo "<p class='error-message'>Vaše uživatelské jméno je již zabrané</p>";
        }
        if ($_GET["error"] == 4) {
            echo "<p class='error-message'>Váš email je neplatný, maximální délka je 50 znaků</p>";
        }
        if ($_GET["error"] == 5) {
            echo "<p class='error-message'>Vaše uživatelské jméno je příliš dlouhé, maximální délka je 30 znaků</p>";
        }
        unset($_GET["error"]);
    }
    ?>

    <form method="post" id="io5f">
        <div></div>

        <div id="i7in5">
            <label id="i7g31" for="il8p4">Email</label>
            <input type="email" id="il8p4" name="email" max="50" required>
        </div>

        <div id="is9z1">
            <label id="i9ixt" for="iqhui">Přezdívka</label>
            <input type="text" id="iqhui" name="prezdivka" max="20" required>
        </div>

        <div id="iu9bc">
            <label id="iabvl" for="itfmy">Heslo</label>
            <input type="password" id="itfmy" name="heslo" required>
        </div>

        <div id="iuowg">
            <button type="submit" id="ibr7p">Odeslat</button>
        </div>
    </form>

    <a id="ioejo" href="/login">
        <div id="i1r9f">Přihlásit se</div>
    </a>
</div>
</div>