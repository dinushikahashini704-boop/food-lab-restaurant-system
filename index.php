<?php
require_once __DIR__ . "/config/db.php";
$items = $pdo->query(
    "SELECT item_name, description, price
     FROM menu_items
     WHERE availability = 'AVAILABLE'
     ORDER BY category_id, item_id"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Lab | Delicious Food</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">FoodLab</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="#menu">Menu</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="demo.php">Database Demo</a>
    </nav>
</header>

<div class="hero">
    <p>WELCOME TO FOOD LAB</p>
    <h1>Delicious food, made with love.</h1>
    <p>Discover fresh, delicious and carefully prepared meals made from quality ingredients.</p>
    <a class="btn" href="#menu">Explore Menu</a>
</div>

<section id="menu">
    <p>OUR MENU</p>
    <h2>Popular Dishes</h2>
    <div class="cards">
        <div class="cards">
    <?php foreach ($items as $item): ?>
        <div class="food-card">
            <div class="icon">🍽️</div>
            <h3><?= htmlspecialchars($item['item_name']) ?></h3>
            <p><?= htmlspecialchars($item['description']) ?></p>
            <p class="price">Rs. <?= number_format($item['price'], 2) ?></p>
            <button class="order-button">Order</button>
        </div>
    <?php endforeach; ?>
</div>
    </div>
</section>

<section id="about">
    <p>ABOUT FOOD LAB</p>
    <h2>Fresh ingredients. Great taste.</h2>
    <p>FOOD LAB Restaurant - ALAWWA</p>
</section>

<section id="contact">
    <h2>Contact</h2>
    <p>Visit us at FOOD LAB Restaurant, Alawwa.</p>
</section>

<footer>&copy; 2026 FOOD LAB Restaurant</footer>

<script src="js/script.js"></script>
</body>
</html>