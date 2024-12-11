<?php
@include 'config.php'; // Ensure DB connection

// Get the search query from the URL parameters
$searchQuery = isset($_GET['searchQuery']) ? mysqli_real_escape_string($conn, $_GET['searchQuery']) : '';

// If there is a search query, search products
if ($searchQuery) {
    // Query the database for products matching the search query
    $product_query = mysqli_query($conn, "SELECT * FROM products WHERE product_name LIKE '%$searchQuery%'");
    
    if (mysqli_num_rows($product_query) > 0) {
        // Loop through and display products
        while ($row = mysqli_fetch_assoc($product_query)) {
            echo "<div class='product'>";
            echo "<h3>" . $row['product_name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            echo "<img src='images/" . $row['image'] . "' alt='" . $row['product_name'] . "'>";
            echo "</div>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>