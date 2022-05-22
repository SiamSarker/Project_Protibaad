<?php include 'includes/connection.php'; ?>
<?php include('dashboard/includes/adminheader.php');  ?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}
//this is jobayer
// session_start();
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
   






<br>
<div>
<h2>Opinion data From ajax:</h2>


<br><br>

        
<table style="width: 80%; border: 2px;">
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    </tr>

    <tbody id="data" style="width: 80%; border: 2px;"></tbody>
</table>

<script>
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "ajax/buddyajax.php", true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";
            for(var a = 0; a < data.length; a++) {
                var Name = data[a].q_category_name;
                var Description = data[a].q_category_des;
                var Date = data[a].q_category_date;

                html += "<tr>";
                    html += "<td>" + Name + "</td>";
                    html += "<td>" + Description + "</td>";
                    html += "<td>" + Date + "</td>";
                html += "</tr>";
            }
            document.getElementById("data").innerHTML += html;
        }
    };
</script>

<br><br><br>
</div>




















</section>
<script src="js/bootstrap.min.js"></script>
<?php include('includes/user_footer.php') ?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>