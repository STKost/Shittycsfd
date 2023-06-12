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
    input[type="password"] {
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
        echo "<p class='error-message'>Špatný email nebo heslo</p>";
    }
    ?>

    <form method="post" id="io5f">
        <div></div>

        <div id="i7in5">
            <label id="i7g31" for="il8p4">Email</label>
            <input type="email" id="il8p4" name="email" required>
        </div>

        <div id="iu9bc">
            <label id="iabvl" for="itfmy">Heslo</label>
            <input type="password" id="itfmy" name="heslo" required>
        </div>

        <div id="iuowg">
            <button type="submit" id="ibr7p">Odeslat</button>
        </div>
    </form>

    <a id="ioejo" href="/registrace">
        <div id="i1r9f">Registrovat se</div>
    </a>
</div>
</div >