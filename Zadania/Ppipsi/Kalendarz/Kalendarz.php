<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>

<section class="baner">
    <div>
        <img src="logol.png" alt="Mój kalendarz">
    </div>
    <div>
        <h1>KALENDARZ</h1>
        <?php
        // Połączenie z bazą danych
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "organizer";

        // Tworzenie połączenia
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
            die("Błąd połączenia: " . $conn->connect_error);
        }

        // Zapytanie 1
        $sql_query_1 = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2023-07-01'";
        $result_1 = $conn->query($sql_query_1);

        if ($result_1->num_rows > 0) {
            while($row = $result_1->fetch_assoc()) {
                // Wyświetlanie nagłówka
                echo "<h3>miesiąc: " . $row["miesiac"] . ", rok: " . $row["rok"] . "</h3>";
            }
        } else {
            echo "Brak wyników";
        }

        ?>
    </div>
</section>

<section class="glowny">
    <?php
    // Zapytanie 2
    $sql_query_2 = "SELECT dataZadania, wpis FROM zadania";
    $result_2 = $conn->query($sql_query_2);

    // Wyświetlanie bloków
    if ($result_2->num_rows > 0) {
        while($row = $result_2->fetch_assoc()) {
            // Tworzenie bloku
            echo "<section>";
            // Wyświetlanie danych
            echo "<h5>" . $row["dataZadania"] . "</h5>";
            echo "<p>" . $row["wpis"] . "</p>";
            // Zamknięcie bloku
            echo "</section>";
        }
    } else {
        echo "Brak wyników";
    }

    // Działanie skryptu do aktualizacji danych
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["wpis"])) {
            // Uaktualnienie danych w bazie danych
            $wpis = $_POST["wpis"];
            $sql_query_3 = "UPDATE zadania SET wpis='$wpis' WHERE dataZadania = '2020-07-13'";
            
            if ($conn->query($sql_query_3) === TRUE) {
                echo "Wpis został dodany pomyślnie";
            } else {
                echo "Błąd: " . $sql_query_3 . "<br>" . $conn->error;
            }
        } else {
            echo "Pole wpis nie może być puste";
        }
    }

    ?>
</section>

<footer>
    <form action="kalendarz.php" method="POST">
        <label for="wpis">dodaj wpis:</label>
        <input type="text" id="wpis" name="wpis">
        <button type="submit">DODAJ</button>
    </form>
    <p>Stronę wykonał: 26</p>
</footer>

<?php
// Zamykanie połączenia
$conn->close();
?>

</body>
</html>
