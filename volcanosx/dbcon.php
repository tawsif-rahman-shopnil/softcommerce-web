<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_web_com";

//$host = "localhost";
//$username = "74w51f";
//$password = "Account*566#";
//$database = "db_web_com";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("PDO Connection failed: " . $e->getMessage());
}

$conn = mysqli_connect($host, $username, $password, $database) or die(mysqli_error());

if ($conn) {
    // Connected using mysqli, use $conn for mysqli queries
} elseif ($pdo) {
    // Connected using PDO, use $pdo for PDO queries
} else {
    die("Failed to connect to the database");
}
?>
