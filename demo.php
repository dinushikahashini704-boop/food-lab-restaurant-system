<?php
require_once __DIR__ . "/config/db.php";

$allowed = ["categories","customers","deliveries","menu_items","orders",
            "order_items","payments","reservations","restaurant_tables","staff","users"];
$table = $_GET["table"] ?? "menu_items";
if (!in_array($table, $allowed)) { die("Invalid table"); }

$rows = $pdo->query("SELECT * FROM `$table` LIMIT 50")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>FOOD LAB - Data Demo</title>
<style>
 body{font-family:Arial;margin:20px}
 a{margin-right:10px}
 table{border-collapse:collapse;margin-top:15px}
 th,td{border:1px solid #999;padding:6px 10px}
 th{background:#eee}
</style>
</head>
<body>
<h2>FOOD LAB - Database Demo</h2>
<?php foreach ($allowed as $t): ?>
  <a href="?table=<?= $t ?>"><?= $t ?></a>
<?php endforeach; ?>

<h3>Table: <?= htmlspecialchars($table) ?> (<?= count($rows) ?> rows)</h3>
<?php if ($rows): ?>
<table>
  <tr><?php foreach (array_keys($rows[0]) as $c): ?><th><?= htmlspecialchars($c) ?></th><?php endforeach; ?></tr>
  <?php foreach ($rows as $r): ?>
    <tr><?php foreach ($r as $v): ?><td><?= htmlspecialchars((string)$v) ?></td><?php endforeach; ?></tr>
  <?php endforeach; ?>
</table>
<?php else: ?>
<p>No data yet in this table.</p>
<?php endif; ?>
</body>
</html>