                                                                                                                                                               <?php
require_once "config.php";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    // Optional: Log errors
    file_put_contents("db_errors.log", $e->getMessage() . PHP_EOL, FILE_APPEND);

    // Display simple safe message
    die("Connection failed.");
}
?>