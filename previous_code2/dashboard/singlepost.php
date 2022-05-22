<?php include 'includes/connection.php'; ?>

<?php include 'includes/adminheader.php';
?>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

  header("location: index.php");
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else {
     header("location: blog.php");
}
?>


<div id="wrapper">
    <?php ?>
    <?php include 'includes/adminnav.php'; ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="">
                    
                        
                    </h1>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                 <?php

                                            $query = "SELECT * FROM blog where file_id='$id' ORDER BY file_id DESC";
                                            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            if (mysqli_num_rows($run_query) > 0) {
                                                while ($row = mysqli_fetch_array($run_query)) {
                                                    $file_id = $row['file_id'];
                                                    $title = $row['title'];
                                                    $description = $row['description'];
                                                    $file = $row['image'];
                                                    ?>
                                <div class="col-md-12 blogShort panel panel-default">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2><?php echo $title;  ?></h2>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="images/<?php echo $file;  ?>" alt="post img" class="img-responsive thumb margin10 img-thumbnail" style="margin-bottom:20px;width: 50%;">
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:50px ;text-align: justify;">
                                            <article>
                                               <?php echo $description;  ?> 
                                            </article>
                                           
                                        </div>
                                        
                                    </div>
                     
                
                                    </div>

             <?php } }?>
                            </div>



                        </div>
                    </div>


                 


                    <script src="js/jquery.js"></script>


                    <script src="js/bootstrap.min.js"></script>

                    </body>

                    </html