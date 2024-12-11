
<?php

@include 'config.php'; // Ensure DB connection

// Fetch Categories from Database
$category_query = mysqli_query($conn, "SELECT * FROM categories");
$categories = [];
if (mysqli_num_rows($category_query) > 0) {
    while ($row = mysqli_fetch_assoc($category_query)) {
        $categories[] = $row;
    }
}

// Fetch Products from Database
$product_query = mysqli_query($conn, "SELECT * FROM products");
$products = [];
if (mysqli_num_rows($product_query) > 0) {
    while ($row = mysqli_fetch_assoc($product_query)) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stationery Shop</title>
    <link rel="icon" type="image/icon" href="Image/stationery.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<!-- header section -->
<header class="header">
	<a href="#" class="logo"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Stationery </a>

	<nav class="navbar">
		<a href="#Home">Home</a>
		<a href="#Features">Features</a>
		<a href="#Categories">Categories</a>
		<a href="#Products">Products</a>
		<a href="#Review">Review</a>
		
	</nav>

	<div class="icons">
		<div class="fa fa-bars" id="menu-btn"></div>
		<div class="fa fa-search" id="search-btn"></div>
		<a href="cart.php" class="fa fa-shopping-cart" id="cart-btn"></a>
		<div class="fa fa-user" id="login-btn"></div>
	</div>
	<form class="search-form">
		<input type="search" id="search-box" placeholder="Search here...">
		<label for="search-box" class="fa fa-search"></label>
	</form>
		
	</header>
	
    <div id="productList"></div> <!-- The results will be injected here -->


	<!-- header section -->

<!--bannar section-->
	<section class="home" id="home">
		<div class="content">
			<h3>All<span> Books</span> And <span>Stationary</span> Products For You</h3>
			<a href="#Categories" class="btn">Shop Now</a>
		</div>
	</section>
<!--bannar section-->

<!-- Features Section-->
	<section class="Features" id="Features">
		<h1 class="heading">Our<span> Features</span></h1>

		<div class="box-container">
			<div class="box">
				<img src="image/features-1.png">
				<h3>Elegant And Premium </h3>
				<p>book, stationary, office accessories, school accessories etc</p>
				<a href="#" class="btn">Read More</a>
			</div>
			<div class="box">
				<img src="image/features-2.jpg">
				<h3>Free Delivery </h3>
				<p>Discreet and Dependable Delivery Solutions<br> Your Parcel, Our Priority</p>
				<a href="#" class="btn">Read More</a>
			</div>
			<div class="box">
				<img src="image/features-3.png">
				<h3>Easy Payment</h3>
				<p>Don't delay, purchase today by Cash and Mobile Banking</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>

	</section>




<!-- Features Section-->
<!-- Categories Section -->
<section class="Categories" id="Categories">
    <h1 class="heading">Product <span>Categories</span></h1>
    <div class="swiper category-slider">
        <div class="swiper-wrapper">
            <?php foreach ($categories as $category) : ?>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="uploaded_img/<?php echo $category['image']; ?>" alt="Category Image">
                        <h3><?php echo $category['name']; ?></h3>
                        <a href="#Products" class="btn">Shop Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Navigation Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Products Section -->
<section class="Products" id="Products">
    <h1 class="heading">Our <span>Products</span></h1>
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php foreach ($products as $product) : ?>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="uploaded_img/<?php echo $product['image']; ?>" alt="Product Image">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['price']; ?> BDT</p>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                            <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Navigation Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
  <!-- Review Section-->
  <section class="Review" id="Review">
	<h1 class="heading">Customers<span>Reviews</span></h1>

	<div class="box-container">
		<div class="box">
			<img src="Image/pic 1.png">
			<p>"Many thanks for the recent order, I received the journal and pen set yesterday, so very good delivery."

			</p>
			<h3>L.G</h3>
			<div class="stars">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				
			</div>
		</div>
		<div class="box">
			<img src="Image/pic 2.png">
			<p>"The product is lovely and your service has been excellent - thank you so much!" </p>
			<h3>H.V</h3>
			<div class="stars">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half"></i>
				
			</div>
		</div>
		<div class="box">
			<img src="Image/pic 3.jpg">
			<p>"Thank you SO much - this is all wonderful!!! Very excited to see! Thanks for all your help."</p>
			<h3>Luna</h3>
			<div class="stars">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				
			</div>
		</div>

	</div>
  </section>

<!-- Review Section-->

<!-- Footer Section-->

<section class="Footer">
	<div class="box-container">
		<div class="box"> 
			<h3> Stationery <i class="fa fa-shopping-bag"></i></h3>
			<p>Fell free to Follow us in social media handlers.All the link are given below.</p>
			<div class="share">
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-whatsapp"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-linkedin"></a>
			</div>
		</div>

		<div class="box"> 
			<h3> Contact Info</h3>
			<a href="#" class="links"><i class="fa fa-phone">+8801323444591</i></a>
			<a href="#" class="links"><i class="fa fa-phone">+8801323444592</i></a>
			<a href="#" class="links"><i class="fa fa-envelope">info@example.com</i></a>
			<a href="#" class="links"><i class="fa fa-map-marker"> Rajshahi-6204, Bangladesh</i></a>
		</div>
		<div class="box"> 
			<h3> Quick Links</h3>
			<a href="#" class="links"><i class="fa fa-arrow-right">Home</i></a>
			<a href="#" class="links"><i class="fa fa-arrow-right">Features</i></a>
			<a href="#" class="links"><i class="fa fa-arrow-right">Products</i></a>
			<a href="#" class="links"><i class="fa fa-arrow-right">Catergories</i></a>
			<a href="#" class="links"><i class="fa fa-arrow-right">Review</i></a>
			
		</div>
		<div class="box"> 
			<h3> Newsletter</h3>
			<p>Subscribe For Lastest Update</p>
			<input type="email" placeholder="Your Email" class="email">
			<input type="submit" value="Subscribe" class="btn">
			<img src="Image/payment.png" class="payment-img">
		</div>

	</div>
	<div class="Credit">Created By <span>Jeasmin</span> | All Rights Reserved

	</div>

</section>

<!-- Footer Section-->

	
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Swiper for Categories
    var categorySwiper = new Swiper('.category-slider', {
        slidesPerView: 4, // Number of slides visible
        spaceBetween: 20, // Space between slides
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    });

    // Swiper for Products
    var productSwiper = new Swiper('.product-slider', {
        slidesPerView: 4, // Number of slides visible
        spaceBetween: 20, // Space between slides
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    });
});
</script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		document.getElementById('login-btn').addEventListener('click', function () {
			window.location.href = 'login_form.php';
		});
	});
	</script>
<script>
$(document).ready(function() {
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent normal form submission

        var query = $('#searchQuery').val(); // Get the search query from the input

        // Send the search query to search.php using AJAX
        $.ajax({
            url: 'search.php', // The search handler script
            method: 'GET',
            data: { searchQuery: query },
            success: function(response) {
                $('#productList').html(response); // Inject the search results into the product list section
            },
            error: function() {
                alert('There was an error searching for the product.');
            }
        });
    });
});
</script>

<!-- Swiper JS -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="JS/script.js"></script>

</body>
</html>  

