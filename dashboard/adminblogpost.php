
<?php include 'includes/connection.php';?>
<?php include 'includes/adminheader.php';?>

<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

//header("location: index.php");
}
?>



       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADD BLOG POST
                        </h1>

<?php
if (isset($_POST['upload'])) {
require "../gump.class.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 

$gump->validation_rules(array(
    'title'    => 'required|max_len,60|min_len,3',
    'description'   => 'required|min_len,3',
));
$gump->filter_rules(array(
    'title' => 'trim|sanitize_string',
    'description' => 'trim|sanitize_string',
    ));
$validated_data = $gump->run($_POST);

if($validated_data === false) {
    ?>
    <center><font color="red" > <?php echo $gump->get_readable_errors(true); ?> </font></center>
    <?php 
    $file_title = $_POST['title'];
      $file_description = $_POST['description'];
}
else {
    $file_title = $validated_data['title'];
      $file_description = $validated_data['description'];


       $status='approved'; 
    


    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('png', 'jpg', 'jpeg');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
    else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size'] > 30720000 )
    {
echo "<script>alert('file size is not proper');</script>";
    }
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid file');</script>";

    }
    else {
        $folder  = 'images/';
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $image = rand(1000 , 1000000) .'.'.$fileext;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$image)) {
            $query = "INSERT INTO blog(title,description,image,status) VALUES ('$file_title' , '$file_description','$image', '$status')";
            $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {

                 if(isset($file_uploader) && $file_uploader=='root'){
                    echo "<script> alert('E-book uploaded successfully.Students will get it');
                            window.location.href='adminnotes.php';</script>";
                }else{
                    echo "<script> alert('Blog uploaded successfully');
                            window.location.href='adminblog.php';</script>";
                }

               
            }
            else {
                "<script> alert('Error while uploading..try again');</script>";
            }
        }
    }
}
}
?>






     <form role="form" action="" method="POST" enctype="multipart/form-data">


	<div class="form-group">
		<label for="post_title">Blog Title</label>
		<input type="text" name="title" class="form-control" placeholder="Eg: Php Tutorial File"  value = "<?php if(isset($_POST['upload'])) {
            echo $file_title; } ?>" required="">
	</div>

	<div class="form-group">
		<label for="post_tags">Blog Description</label>
		<textarea rows="5" name="description" class="form-control" placeholder="Eg: Php Tutorial File includes basic php programming ...."  required="" ">
      <?php if(isset($_POST['upload'])) {
            echo $file_description;  } ?>      
        </textarea>
	</div>

	 <div class="form-group">
        <label for="post_image">Select Image</label><font color="brown"> (allowed file type: 'png','jpg','jpeg' | allowed maximum size: 30 mb ) </font>
		<input type="file" name="file" class="form-control" accept="image/*" required> 
     </div>

<button type="submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Blog</button>
<br>
<br>
</form>
</div>
</div>
</div>
</div>
</div>


<script src="js/jquery.js"></script>

    
<script src="js/bootstrap.min.js"></script>

</body>

</html>



