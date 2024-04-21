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
$sql = "SELECT DISTINCT nazwa FROM WLASCIWOSCI";
$result = $conn->query($sql);

// Wyświetlanie wyników
echo "<h2>Właściwości lecznicze wybranych ziół</h2>";
if ($result->num_rows > 0) {
    // Wyświetlanie listy nieuporządkowanej
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nazwa"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Brak wyników.";
}

// Zamykanie połączenia
$conn->close();
?>
