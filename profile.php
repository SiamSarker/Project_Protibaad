<?php
include 'includes/connection.php';
?>
<?php
session_start();
function str_openssl_dec($str, $iv){
    $key='progga1234567890#%$%$#$%$';
    $chiper="AES-128-CTR";
    $options=0;
    $str=openssl_decrypt($str, $chiper, $key, $options, $iv);
    return $str;
 
 }


 
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Protibaaad</title>
    <link rel="icon" type="image" href="image/icon.png">

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/welcome.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="write_review.css">

</head>

<body>
<?php include('includes/user_navbar.php') ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <table class="table table-striped border">
                    <thead class="table-primary">
                        <tr>
                            <th></th>
                            <th>User Info</th>
                        </tr>
                    </thead>
                    <?php

function fetch_data(){
    include 'includes/connection.php';

    $username =  $_SESSION['username'];
    $sql = "SELECT * FROM  users WHERE `username`='$username'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result)>0){
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;

    }else{
        return $row=[];
    }

   
}
$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
    echo '<table border="1" class="table">
        <tr>
            
                <th scope="col">Title</th>
                <th scope="col">Date</th>
               
        </tr>';
    if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            $iv=$data['iv'];
            $iv=hex2bin($iv);
            $username = $data["username"];
            $email = $data["email"];
            $email =str_openssl_dec($email, $iv);
            echo "<tr> 
         
          <td>".$username."</td>
          <td>".$email."</td>
         
   </tr>";

            $sn++;
        }
    }else{

        echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
    }
    echo "</table>";
}

                    $username =  $_SESSION['username'];
                    $sql = "SELECT * FROM  users WHERE `username`='$username'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $iv=$row['iv'];
                            $iv=hex2bin($iv);
                            $username = $row["username"];
                            $email = $row["email"];
                            $email =str_openssl_dec($email, $iv);
                    ?>
                           
                            <a href="change-password.php">Update Password</a>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('includes/user_footer.php') ?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
    // $(document).on('click','#showData',function(e){
    $(document).ready(function (){
        $.ajax({
            type: "GET",
            url: "profile.php",
            dataType: "html",
            success: function(data){
                $("#table-container").html(data);

            }
        });
    });
</script>

</body>

</html>