<?php
require_once __DIR__ . "/config/db.php";

echo "<h2>Connected to the database successfully!</h2>";

$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
echo "<h3>Tables found (" . count($tables) . "):</h3><ul>";
foreach ($tables as $t) {
    echo "<li>" . htmlspecialchars($t) . "</li>";
}
echo "</ul>";