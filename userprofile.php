<?php
include('includes/connection.php');
include('dashboard/includes/adminheader.php');
?>

<?php
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$userid = $row['id'];
		$usernm = $row['username'];
		$userpassword = $row['password'];
		$email = $row['email'];
	}


	if (isset($_POST['update'])) {
		require "../gump.class.php";
		$gump = new GUMP();
		$_POST = $gump->sanitize($_POST);


		$gump->validation_rules(array(
			'name'   => 'required|alpha_space|max_len,30|min_len,2',
			'email'       => 'required|valid_email',
			'currentpassword' => 'required|max_len,50|min_len,6',
			'newpassword'    => 'max_len,50|min_len,6',
		));
		$gump->filter_rules(array(
			'name' => 'trim|sanitize_string',
			'currentpassword' => 'trim',
			'newpassword' => 'trim',
			'email'    => 'trim|sanitize_email',
		));
		$validated_data = $gump->run($_POST);
		if ($validated_data === false) {
?>
			<center>
				<font color="red"> <?php echo $gump->get_readable_errors(true); ?> </font>
			</center>
<?php
		} else if (!password_verify($validated_data['currentpassword'],  $userpassword)) {
			echo  "<center><font color='red'>Current password is wrong! </font></center>";
		} else if (empty($_POST['newpassword'])) {
			$name = $validated_data['name'];
			$email = $validated_data['email'];
			$updatequery1 = "UPDATE users SET name = '$name' , email='$email' WHERE id = '$userid' ";
			$result2 = mysqli_query($conn, $updatequery1) or die(mysqli_error($conn));
			if (mysqli_affected_rows($conn) > 0) {
				echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
    window.location.href='userprofile.php';</script>";
			} else {
				echo "<script>alert('An error occured, Try again!');</script>";
			}
		} else if (isset($_POST['newpassword']) &&  ($_POST['newpassword'] !== $_POST['confirmnewpassword'])) {
			echo  "<center><font color='red'>New password and Confirm New password do not match </font></center>";
		} else {
			$name = $validated_data['name'];
			$email = $validated_data['email'];
			$pass = $validated_data['newpassword'];
			$userpassword = password_hash("$pass", PASSWORD_DEFAULT);

			$updatequery = "UPDATE users SET password = '$userpassword', name='$name', email= '$email' WHERE id='$userid'";
			$result1 = mysqli_query($conn, $updatequery) or die(mysqli_error($conn));
			if (mysqli_affected_rows($conn) > 0) {
				echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
	window.location.href='userprofile.php';</script>";
			} else {
				echo "<script>alert('An error occured, Try again!');</script>";
			}
		}
	}
}
?>

<div id="wrapper">
	<?php include('includes/user_header.php') ?>
	<?php include('includes/user_navbar.php') ?>

	<div id="page-wrapper">

		<div class="container-fluid">
			<div class="row" style="color:#fff;">
				<div class="col-lg-12">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<h1 class="page-header" style="color:#333;">
						Welcome to your Profile
						<small style="color:green;"><?php echo $_SESSION['username']; ?></small>
					</h1>

					<form role="form" action="" method="POST" enctype="multipart/form-data">
						<hr>
						<div class="form-group">
							<label for="user_title" style="color: #333;">User Name</label>
							<input type="text" name="username" class="form-control" value=" <?php echo $username; ?>" readonly>
						</div>

						<div class="form-group">
							<label for="user_tag" style="color: #333;">Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
						</div>

						<div class="form-group">
							<label for="usertag" style="color: #333;">Current Password</label>
							<input type="password" name="currentpassword" class="form-control" placeholder="Enter Current password" required>
						</div>
						<div class="form-group">
							<label for="usertag" style="color: #333;">New Password <font color='brown'> (changing password is optional)</font></label>
							<input type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
						</div>
						<div class="form-group">
							<label for="usertag" style="color: #333;">Confirm New Password</label>
							<input type="password" name="confirmnewpassword" class="form-control" placeholder="Re-Enter New Password">
						</div>
						<hr>


						<button type="submit" name="update" class="btn btn-primary" value="Update User">Update User</button>
						<br>
						<br>

				</div>
			</div>


		</div>


	</div>

	<?php include('includes/user_footer.php') ?>
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<script src="js/script.js"></script>

	</body>

	</html>