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
        max-width: 800px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .alert {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td:last-child {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
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
        $error = $_GET["error"];
        if ($error == 1) {
            echo "<div class='alert alert-danger' role='alert'>Chyba při odstraňování filmu!</div>";
        }
        unset($_GET["error"]);
    }

    if (isset($_GET["success"])) {
        $success = $_GET["success"];
        if ($success == 1) {
            echo "<div class='alert alert-success' role='alert'>Film byl úspěšně odstraněn!</div>";
        }
        unset($_GET["success"]);
    }

    $filmy = Film::vyber_vsechny();

    echo "<table>";
    echo "<tr>";
    echo "<th>Název</th>";
    echo "<th>Žánry</th>";
    echo "<th>Délka</th>";
    echo "<th>Rok vydání</th>";
    echo "<th>Odstranit</th>";
    echo "</tr>";

    foreach ($filmy as $film) {
        echo "<tr>";
        echo "<td>" . $film["nazev"] . "</td>";
        echo "<td>" . implode(", ", $film["zanry"]) . "</td>";
        echo "<td>" . $film["delka"] . "</td>";
        echo "<td>" . $film["rok_vydani"] . "</td>";
        echo "<td><a href='/admin/film/" . $film["slug"] . "/odstranit'>odstranit</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
<div>