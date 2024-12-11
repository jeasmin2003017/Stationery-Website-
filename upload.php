<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $targetDir = "uploaded_img/";
    $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
            // Insert product info into the database
            $image = $_FILES["product_image"]["name"];
            $query = "INSERT INTO cart (name, price, image, quantity) VALUES ('$productName', '$productPrice', '$image', 1)";
            if (mysqli_query($conn, $query)) {
                echo "The file ". htmlspecialchars(basename($_FILES["product_image"]["name"])). " has been uploaded and product added.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

mysqli_close($conn);
?>
