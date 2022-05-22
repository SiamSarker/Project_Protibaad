<?php include 'includes/connection.php'; ?>

<?php include 'includes/adminheader.php';
?>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

  header("location: index.php");
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
                    <h1 class="page-header">
                    
                        ALL POST
                    </h1>

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                 <?php

                                            $query = "SELECT * FROM blog  ORDER BY file_id DESC";
                                            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            if (mysqli_num_rows($run_query) > 0) {
                                                while ($row = mysqli_fetch_array($run_query)) {
                                                    $file_id = $row['file_id'];
                                                    $title = $row['title'];
                                                    $description = $row['description'];
                                                    $file = $row['image'];
                                                    ?>
                                <div class="col-md-10 blogShort panel panel-default">
                     <h2><?php echo $title;  ?></h2>
                     <img src="images/<?php echo $file;  ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="height: 150px;width: 150px;margin-right:5px;">
                     
                     <article style="text-align: justify;">
                     
                             <?php echo substr($description, 150).'...';  ?>
                      
                     </article>
                     <a style="margin-bottom: 10px;" class="btn btn-primary pull-right marginBottom10" href="singlepost.php?id=<?php echo $file_id;  ?>">READ MORE</a> 
                 </div>

             <?php } }?>
                            </div>



                        </div>
                    </div>


                 


                    <script src="js/jquery.js"></script>


                    <script src="js/bootstrap.min.js"></script>

                    </body>

                    </html