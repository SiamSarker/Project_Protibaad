<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();

?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>


    <!-- features section starts  -->

    <section class="features margin-top" id="features">
        <h1 class="heading"> <span>Crimes</span> </h1>
        <?php if($_SESSION["role"] == 'police'){ ?>
            <a class="btn btn-primary post-btn" href="crime_list.php">Crime List</a>
        <?php } ?>
        <a class="btn btn-primary post-btn" href="crime_create.php">Post A Crime</a>
    
        <div class="box-container">
            <?php 
           
           if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                // echo  $id;
                $sql = "SELECT * FROM crimes  WHERE `user_id`='$id'";
                $result = mysqli_query($conn, $sql);
           
            while($row =  mysqli_fetch_array($result)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Title: <?php echo $row['title']; ?></h3>
                <p>Location: <?php echo $row['location']; ?></p>
                <p>Date: <?php echo $row['posted_at']; ?></p>
                <a href="crime_details.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
            </div>
            <?php } }?>
        </div>

    </section>

    <!-- features section ends -->


    <!-- footer section starts  -->

    <?php include('includes/user_footer.php') ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>