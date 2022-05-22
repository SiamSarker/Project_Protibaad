<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
$sql = "SELECT * FROM crimes  WHERE approve_status='1' ";
$result = mysqli_query($conn, $sql);
?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>


    <!-- features section starts  -->

    <section class="features margin-top" id="features">
        <h1 class="heading"> <span>Crimes</span> </h1>
        <a class="btn btn-primary post-btn" href="crime_create.php">Post A Crime</a>
        <?php if($_SESSION["role"] == 'admin'){ ?>
            <a class="btn btn-primary post-btn" href="crime_list.php">Crime List</a>
        <?php } ?>
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




        <br>
        
        <div class="features margin-top">

        <h2>Crime Alert data from ajax:</h2>
        <br><br>

        
        <table style="width: 100%; border: 2px;">
            <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            </tr>

            <tbody id="data" style="width: 100%; border: 2px;"></tbody>
        </table>
        
        <script>
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax/crimesajax.php", true);
            ajax.send();
        
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);
        
                    var html = "";
                    for(var a = 0; a < data.length; a++) {
                        var Title = data[a].title;
                        var Description = data[a].description;
                        var Date = data[a].posted_at;
                        var Location = data[a].location;
        
                        html += "<tr>";
                            html += "<td>" + Title + "</td>";
                            html += "<td>" + Description + "</td>";
                            html += "<td>" + Date + "</td>";
                            html += "<td>" + Location + "</td>";
                        html += "</tr>";
                    }
                    document.getElementById("data").innerHTML += html;
                }
            };
        </script>

</div>

        <br><br><br>

 






    </section>

    <!-- features section ends -->


    <!-- footer section starts  -->

    <?php include('includes/user_footer.php') ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>