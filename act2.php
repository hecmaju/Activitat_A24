<?php
session_start();

// Inicialitza la cistella i el total si no existeixen
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

// Productes disponibles
$productes = [
    'Sabates Nike' => 45,
    'Dessuadora Adidas' => 30,
    'Camiseta Blanca' => 25,
    'Calcetins Nike' => 15
];

if (isset($_GET['product']) && isset($productes[$_GET['product']])) {
    $producte = $_GET['product'];
    $price = $productes[$producte];

    $_SESSION['cart'][] = $producte;
    $_SESSION['total'] += $price;
}

if (isset($_GET['clear_cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['total'] = 0;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cistella de Compra</title>
</head>
<body>
    <h2>Total: <?php echo number_format($_SESSION['total'], 2); ?> €</h2>
    
    <h2>Llistat d'articles:</h2>
    <ul>
        <?php foreach ($productes as $name => $price): ?>
            <li>
                <a href="?product=<?php echo urlencode($name); ?>">
                    <?php echo $name . " - " . number_format($price, 2) . " €"; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="?clear_cart=1">[Buida la cistella]</a>
</body>
</html>
