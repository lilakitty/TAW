<?php
	if($before_login)
	{
?>
	<nav class="navbar navbar-dark bg-dark">
	<li class="nav-item active"><a class="nav-link" href="index.php?page=index">Home</a></li>
	<li class="nav-item active"><a class="nav-link" href="index.php?page=register">Register</a></li>
	<li class="nav-item active"><a class="nav-link" href="index.php?page=login">Login</a></li>
	<li class="nav-item active"><a class="nav-link" href="index.php?page=forgot_password">Forgot Password</a></li>
	</nav>

<?php
	}
	else if($after_login)
	{
?>
<ol>
	<li><a href="index.php?page=home">Home</a></li>
	<li><a href="index.php?page=profile">Profile</a></li>
	<li><a href="index.php?page=book_add">Add Book</a></li>
	<li><a href="index.php?page=book_list">List Book</a></li>
	<li><a href="index.php?page=logout">Logout</a></li>
</ol>
<?php
	}
?>
