<?php include 'includes/connection.php'; ?>
<?php include('dashboard/includes/adminheader.php');  ?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
       <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->


</head>
<body style="color:#333;">



<!-- menu section starts  -->
</br>
<section class="menu container" id="courses">

    <h1 class="heading" style="color:black"> Let's <span>Discuss</span> </h1>

    <div class="box-container ">
    <?php 
         $sql = "SELECT * FROM `q_category`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          $id = $row['q_category_id'];
          $cat = $row['q_category_name'];
          $desc = $row['q_category_des'];
          echo '<div class="box panel panel-default"><div  style="margin: 10px;">
          
          <h3><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h3>
          <p class="card-text">' . substr($desc, 0, 50). '... </p>
          <a style="color: black;" href="threadlist.php?catid=' . $id . ' "class="btn">View</a>
      </div></div>';
         } 
         ?>  
</div>
   

</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>