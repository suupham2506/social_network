<?php
include("includes/connection.php");
if (isset($_POST['sign_up'])) {

			$firstname = mysqli_escape_string($con, $_POST['u_firstname']);
			$lastname = mysqli_escape_string($con, $_POST['u_lastname']);
			$email = mysqli_escape_string($con, $_POST['u_email']);
			$password = mysqli_escape_string($con, $_POST['u_pass']);
			$birthday = mysqli_escape_string($con, $_POST['u_birthday']);
			$gender = mysqli_escape_string($con, $_POST['u_gender']);
			$date = date("m-d-Y");
			$status = "Unverified";
			$posts = "No uploaded";

			$get_email = "SELECT * FROM users WHERE user_email ='$email'";
			$run_email = mysqli_query($con, $get_email);
			$check = mysqli_num_rows($run_email);

			if ($check == 1) {
				echo "<script>alert('This email is already taken!!!')</script>";
				exit();
			}

			if (strlen($password) < 8) {
				echo "<script>alert('Password should be minimum 8 characters!!!')</script>";
			}
			else{
				$insert = "insert into users (user_fname, user_lname, user_email, user_pass, user_gender, user_birthday, user_image, register_date, last_login, status, posts) values('$firstname', '$lastname', '$email', '$password', '$gender', '$birthday', 'default.jpg', NOW(), NOW(), '$status', '$posts')";

				$run_insert = mysqli_query($con, $insert);
				if ($run_insert) {
					$_SESSION['user_email'] = $email;
					echo "<script>alert('Register successfully!!!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}
			}


		}

?>