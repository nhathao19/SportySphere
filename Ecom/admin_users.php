<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

// delete user
if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed') ;
    header('location:admin_users.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- admin style  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
    
<?php include 'admin_header.php'; ?>

<section class="users">

    <h1 class="title"> user accounts </h1>

    <div class="box-container">
        <?php
        $stmt = $conn->prepare("SELECT * FROM `users`");
        $stmt->execute();
        $result = $stmt->get_result();
        while($fetch_users = $result->fetch_assoc()){
        ?>
        <div class="box">
            <p> username : <span><?php echo $fetch_users['name']; ?></span></p>
            <p> email : <span><?php echo $fetch_users['email']; ?></span></p>
            <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--red2)'; } ?>;"><?php echo $fetch_users['user_type']; ?></span></p>
            <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete</a>
        </div>
        <?php
        };
        ?>
    </div>

</section>









<!-- admin js link  -->
<script src="js/admin_script.js"></script>

</body>
</html>