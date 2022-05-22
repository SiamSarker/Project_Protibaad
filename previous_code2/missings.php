<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
$sql = "SELECT * FROM missings  WHERE approve_status='1' ";
$result = mysqli_query($conn, $sql);
?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>


    <!-- features section starts  -->

    <section class="features margin-top" id="features">
        <h1 class="heading"> <span>Missing Reports</span> </h1>
        <a class="btn btn-primary post-btn" href="missing_create.php">Post A Missing Report</a>
        <?php if($_SESSION["role"] == 'admin'){ ?>
            <a class="btn btn-primary post-btn" href="missing_list.php">Missing List</a>
        <?php } ?>
        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Name: <?php echo $row['name']; ?></h3>
                <p>Age: <?php echo $row['age']; ?></p>
                <p>Concern Person Contact Number: <?php echo $row['concern_contact']; ?></p>
                <p>Date: <?php echo $row['posted_at']; ?></p>
                <a href="missing_details.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
            </div>
            <?php } ?>
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