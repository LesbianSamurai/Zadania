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

// Zapytanie SQL
$sql = "SELECT nazwa_pliku, polska_nazwa FROM ZIOLA";
$result = $conn->query($sql);

// Wyświetlanie wyników
if ($result->num_rows > 0) {
    // Wyświetlanie obrazów
    while($row = $result->fetch_assoc()) {
        echo "<img src='" . $row["nazwa_pliku"] . "' alt='" . $row["polska_nazwa"] . "' title='" . $row["polska_nazwa"] . "'>";
    }
} else {
    echo "Brak wyników.";
}

// Zamykanie połączenia
$conn->close();
?>
