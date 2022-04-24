<?php include 'includes/connection.php';?>
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

$sql = "SELECT * FROM crimes WHERE approve_status='1' ORDER BY `id` DESC LIMIT 3";
$result = mysqli_query($conn, $sql);

$sql_missings = "SELECT * FROM missings WHERE approve_status='1' ORDER BY `id` DESC LIMIT 3";
$result_missings = mysqli_query($conn, $sql_missings);

$sql_blogs = "SELECT * FROM blogs ORDER BY `id` DESC LIMIT 3";
$result_blogs = mysqli_query($conn, $sql_blogs);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protibaaad</title>
    <link rel="icon" type="image" href="image/icon.png">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/welcome.css">

</head>

<body>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>"দুর্নীতি মুক্ত<span> সমাজ </span> গড়ে তুলুন"</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam libero nostrum veniam facere tempore nisi.</p>
            <a href="#" class="btn">Read More</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- features section starts  -->

    <section class="features" id="features">

        <h1 class="heading"> <span>Crime Alert</span> </h1>

        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { ?>
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
            <?php } ?>
        </div>

    </section>

    <section class="features" id="features">

        <h1 class="heading"> <span>Missing Report</span> </h1>

        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result_missings)) { ?>
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
    <section class="features" id="features">

        <h1 class="heading"> <span>Blogs</span> </h1>

        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result_blogs)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Title: <?php echo $row['title']; ?></h3>
                <p>Date: <?php echo $row['posted_at']; ?></p>
                <a href="blog_details.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
            </div>
            <?php } ?>
        </div>

    </section>

    <!-- features section ends -->


    <!-- categories section starts  -->

    <section class="categories" id="categories">

        <h1 class="heading"> Opinion <span>Section</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

        </div>

    </section>

    <!-- categories section ends -->



    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> Protibaad <img src="image/fev.png" alt="Image"> </h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, saepe.</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"> <i class="fas fa-phone"></i>999 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> 01320001299 </a>
                <a href="#" class="links"> <i class="fas fa-envelope"></i> protibaad@gmail.com </a>
                <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Madani Avenue, Dhaka-1212 </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> blogs </a>
            </div>

            <div class="box">
                <h3>newsletter</h3>
                <p>subscribe for latest updates</p>
                <input type="email" placeholder="your email" class="email">
                <input type="submit" value="subscribe" class="btn">

            </div>

        </div>

        <div class="credit"> @ <span> Team Protibaad </span> | all rights reserved </div>



    </section>

    <!-- footer section ends -->


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>