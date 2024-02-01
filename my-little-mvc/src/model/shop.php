<?php
require_once 'AbstractProduct.php';
require_once 'Category.php';
require_once 'Clothing.php';
require_once 'Electronic.php';

$products = AbstactProduct::findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique en Ligne</title>
</head>
<body>
    <h1>Nos Produits</h1>

    <?php
    foreach ($products as $product) {
        echo '<div>';
        echo '<h2>' . $product->getName() . '</h2>';
        echo '<p>' . $product->getDescription() . '</p>';
        echo '<p>Prix: ' . $product->getPrice() . '€</p>';
        
        if ($product instanceof Clothing) {
            echo '<p>Taille: ' . $product->getSize() . '</p>';
            echo '<p>Couleur: ' . $product->getColor() . '</p>';
            echo '<p>Type: ' . $product->getType() . '</p>';
        } elseif ($product instanceof Electronic) {
            echo '<p>Marque: ' . $product->getBrand() . '</p>';
            echo '<p>Frais de garantie: ' . $product->getWarantyFee() . '€</p>';
        }

        $category = $product->getCategory();
        echo '<p>Catégorie: ' . $category->getName() . '</p>';

        echo '</div>';
    }
    ?>

</body>
</html>