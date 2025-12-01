<?php 
$host = "localhost";
$user = "root";
$password = "";
$dbname = "web_designer_db"; 
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode for better debugging
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    // Show a more helpful error message if connection still fails
    die("Database Connection Error: " . $e->getMessage() . 
        "<br>Please ensure your MySQL service is running and the database 'web_designer_db' exists.");
}
?>