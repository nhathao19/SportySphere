<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php include 'header.php'; ?>

<div class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">Home</a> / about</p>
</div>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img.jpg" alt="">
        </div>

        <div class="content">
            <h3>Why choose us ?</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio hic doloremque, eum dolores ex maiores eius aperiam minus, alias accusamus quod iste id. Voluptatum culpa quam ipsa! Reiciendis, odio dicta.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>
            
    </div>

</section>

<section class="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>"Comfortable and stylish, these kicks are perfect for everyday wear. Ideal for sneaker lovers seeking a versatile and trendy addition to their collection."</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ryan Gosling</h3>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>"I love the colour so bright especially for summer but the tongue is rather big in comparison to the other Dunk trainers."</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Rose Leto</h3>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>"Overall a great cleat. I love them! This is my 4th pair and I think I will keep buying them. Love the color."</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Catch 22</h3>
        </div>

        <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>"Look good play good. Nice fit all around and feeling super fast in these boots!"</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Sir Jokes-a-Lot</h3>
        </div>

        <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>"I love these sneakers I run every day and these are super comfortable 💪🏽🦈"</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Antenna Georgina</h3>
        </div>

        <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>"Glad I decided to splurge on these. Have been needing a new pair of gym shoes for a while! Can’t go wrong with a pair of metcons! Wish they would’ve had the free metcons in the store bud very happy with these!"</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Crazy Eyes</h3>
        </div>

    </div>

</section>








<?php include 'footer.php'; ?>

<!-- js link  -->
<script src="js/script.js"></script>

</body>
</html>
