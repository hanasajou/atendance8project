                                                                                                                                                          <?php
require_once "db_connect.php";

if ($conn) {
    echo "<h2 style='color:green;'>Connection successful</h2>";
} else {
    echo "<h2 style='color:red;'>Connection failed</h2>";
}
?>