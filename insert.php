<?php
// Databasegegevens
$host = 'localhost:3307';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Maak een verbinding met de database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "db connection works";
} 
catch (\PDOException $e) 
{
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de ingevulde gegevens uit het formulier
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    // Bereid de SQL-query voor om een nieuw product toe te voegen
    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_naam, $prijs_per_stuk, $omschrijving]);

    if ($stmt->rowCount() > 0) {
        echo "Product succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van het product.";
    }
}

// Sluit de databaseverbinding
$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuw product toe:</h2>
    <form method="POST" action="insert.php">
        <label for="product_naam">Productnaam:</label>
        <input type="text" name="product_naam" id="product_naam" required><br><br>

        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" step="0.01" name="prijs_per_stuk" id="prijs_per_stuk" required><br><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea name="omschrijving" id="omschrijving" required></textarea><br><br>

        <input type="submit" value="Product toevoegen">
    </form>
</body>
</html>
