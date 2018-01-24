<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome User</title>
	<link rel="stylesheet" href="styles/home_style.css">
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['user_email']; ?></h1>
</body>
</html>