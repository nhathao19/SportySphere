<?php

include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit();
}

$user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

// update cart
if(isset($_POST['update_cart'])){

    $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);
    $cart_quantity = mysqli_real_escape_string($conn, $_POST['cart_quantity']);

    mysqli_query($conn,"UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id' AND user_id = '$user_id'") or die('query failed');

    $message[] = 'cart quantity update';
}

// delete cart
if(isset($_GET['delete'])){
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete']);
    mysqli_query($conn,"DELETE FROM `cart` WHERE id = '$delete_id' AND user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
    exit();
}

// delete all 
if(isset($_GET['delete_all'])){
    mysqli_query($conn,"DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php include 'header.php'; ?>

<div class="heading">
    <h3>Bag</h3>
    <p> <a href="home.php">Home</a> / cart</p>
</div>

<section class="shopping-cart">

    <h1 class="title">products added</h1>

    <div class="box-container">
        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        ?>
     <div class="box">
        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Do you want delete this from cart?');"></a> 
        <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt=""> 
        <div class="name"><?php echo $fetch_cart['name']; ?></div>
        <div class="price">$<?php echo $fetch_cart['price']; ?></div>
        <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" class="option-btn" name="update_cart" value="update">
        </form>
        <div class="sub-total"> Sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span></div>
    </div>
        <?php
        $grand_total += $sub_total;
                }
            }else{
                echo '<p class="empty">0 items | -</p>';
            }
        ?>
    </div>

    <div style="margin-top: 2rem; text-align: center;">
        <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)? '':'disabled'; ?>" onclick="return confirm('Do you want delete all from cart?');">delete all</a> 
    </div>

    <div class="cart-total">
        <p> Total: <span>$<?php echo $grand_total; ?>/-</span></p>
        <div class="flex">
            <a href="shop.php" class="option-btn">continue shopping</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)? '':'disabled'; ?>">Go to checkout</a>
        </div>
    </div> 

</section>

<?php include 'footer.php'; ?>

<!-- js link  -->
<script src="js/script.js"></script>

</body>
</html>
