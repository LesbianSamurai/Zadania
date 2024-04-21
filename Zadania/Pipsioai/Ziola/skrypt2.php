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
$sql = "SELECT polska_nazwa FROM ZIOLA";
$result = $conn->query($sql);

// Wyświetlanie wyników
if ($result->num_rows > 0) {
    // Wyświetlanie listy numerowanej
    echo "<ol>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["polska_nazwa"] . "</li>";
    }
    echo "</ol>";
} else {
    echo "Brak wyników.";
}

// Zamykanie połączenia
$conn->close();
?>
