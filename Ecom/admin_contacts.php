<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

//delete
if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `messages` WHERE id = '$delete_id'") or die('query failed') ;
    header('location:admin_contacts.php');

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>messages</title>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- admin style  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
    
<?php include 'admin_header.php'; ?>

<section class="messages">

    <h1 class="title"> messages </h1>

<div class="box-container">
    <?php
        $stmt = $conn->prepare("SELECT * FROM `messages`");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($fetch_message = $result->fetch_assoc()){
    ?>
    <div class="box">
        <p> name : <span><?php echo $fetch_message['name']; ?></span></p>
        <p> number : <span><?php echo $fetch_message['number']; ?></span></p>
        <p> email : <span><?php echo $fetch_message['email']; ?></span></p>
        <p> message : <span><?php echo $fetch_message['message']; ?></span></p>
        <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
    </div>
    <?php
            };
        }else{
            echo '<p class="empty">you have no messages!</p>';
        }
    ?>
</div>



</section>








<!-- admin js link  -->
<script src="js/admin_script.js"></script>

</body>
</html>