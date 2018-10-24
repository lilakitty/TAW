<?php
	if($before_login)
	{
?>

  	<nav>
  		<div class="nav-wrapper purple darken-3">
  			<a href="#!" class="brand-logo"><i class="material-icons">library_books</i>BMS</a>
  		<ul class="right hide-on-med-and-down">
			<li><a href="index.php?page=index"><i class="material-icons">home</i>Home</a></li>
			<li><a href="index.php?page=register"><i class="material-icons">assignment_ind</i>Register</a></li>
			<li><a href="index.php?page=login"><i class="material-icons">vpn_key</i>Login</a></li>
			<li><a href="index.php?page=forgot_password"><i class="material-icons">vpn_lock</i>Forgot Password</a>
			</li>
		</ul>
		</div>
	</nav>

<?php
	}
	else if($after_login)
	{
?>

<nav>
  		<div class="nav-wrapper purple darken-3">
  			<a href="#!" class="brand-logo"><i class="material-icons">library_books</i>BMS</a>
  		<ul class="right hide-on-med-and-down">
			<li><a href="index.php?page=home"><i class="material-icons">home</i>Home</a></li>
			<li><a href="index.php?page=profile"><i class="material-icons">face</i>Profile</a></li>
			<li><a href="index.php?page=book_add"><i class="material-icons">library_add</i>Add Book</a></li>
			<li><a href="index.php?page=book_list"><i class="material-icons">list</i>List Book</a>
			</li>
			<li><a href="index.php?page=logout"><i class="material-icons">directions_walk</i>Logout</a>
			</li>
		</ul>
		</div>
	</nav>

<?php
	}
?>
