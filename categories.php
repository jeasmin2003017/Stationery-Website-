<?php
@include 'config.php';

$categories_query = mysqli_query($conn, "SELECT * FROM `categories`");

$categories = [];
if (mysqli_num_rows($categories_query) > 0) {
    while ($row = mysqli_fetch_assoc($categories_query)) {
        $categories[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section class="categories">
        <div class="category-list">
            <?php
                $query = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='category'>";
                        echo "<img src='uploaded_img/{$row['image']}' alt='{$row['name']}'>";
                        echo "<h3>{$row['name']}</h3>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No categories found.</p>";
                }
            ?>
        </div>
    </section>

    <!-- custom js file link  -->
<script src="js/script2.js"></script>

</body>
</html>
