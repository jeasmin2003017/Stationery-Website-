<?php
session_start();  // Start the session

@include 'config.php';  // Ensure DB connection

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch product details from the database
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($query);

    // If product exists, add it to the cart session
    if ($product) {
        // If cart doesn't exist in session, create an empty cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product['id']) {
                $item['quantity']++;  // Increase quantity if the product already exists
                $found = true;
                break;
            }
        }

        // If not found, add the product to the cart
        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }

        echo "Product added to cart!";
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product ID provided.";
}
?>