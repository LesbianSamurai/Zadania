<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ziołolecznictwo</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>

<section class="miniatura">
    <?php
    // Połączenie z bazą danych
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ziołolecznictwo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Połączenie nieudane: " . $conn->connect_error);
    }
    ?>
</section>

<section class="tytulowy">
    <h1>Ziołowa Siła</h1>
</section>

<section class="lewy">
    <?php
    // Skrypt nr 2
    $sql2 = "SELECT polska_nazwa FROM ZIOLA";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        echo "<ol>";
        while($row2 = $result2->fetch_assoc()) {
            echo "<li>" . $row2["polska_nazwa"] . "</li>";
        }
        echo "</ol>";
    } else {
        echo "Brak wyników.";
    }
    ?>
</section>

<section class="prawy">
    <?php
    // Skrypt nr 3
    $sql3 = "SELECT DISTINCT nazwa FROM WLASCIWOSCI";
    $result3 = $conn->query($sql3);

    echo "<h2>Właściwości lecznicze wybranych ziół</h2>";
    if ($result3->num_rows > 0) {
        echo "<ul>";
        while($row3 = $result3->fetch_assoc()) {
            echo "<li>" . $row3["nazwa"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Brak wyników.";
    }

    // Zamykanie połączenia
    $conn->close();
    ?>
</section>

<footer class="stopka">
    <p>Autor</p>
    <p>Numer z dziennika: 26</p>
</footer>

</body>
</html>
