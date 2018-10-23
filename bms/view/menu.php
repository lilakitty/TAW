<?php
	if($before_login)
	{
?>

	<nav class="navbar navbar-dark bg-info">
	<a class="navbar-brand" href="index.php?page=index">Home</a>
	<a class="navbar-brand" href="index.php?page=register">Register</a>
	<a class="navbar-brand" href="index.php?page=login">Login</a>
	<a class="navbar-brand" href="index.php?page=forgot_password">Forgot Password</a>
	</nav>

<?php
	}
	else if($after_login)
	{
?>

	<nav class="navbar navbar-dark bg-info">
	<a class="navbar-brand" href="index.php?page=home">Home</a>
	<a class="navbar-brand" href="index.php?page=profile">Profile</a>
	<a class="navbar-brand" href="index.php?page=book_add">Add Book</a>
	<a class="navbar-brand" href="index.php?page=book_list">List Book</a>
	<a class="navbar-brand" href="index.php?page=logout">Logout</a>
	</nav>
<?php
	}
?>
