<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>
<div class="titulos">
	<h3>Welcome to Home Page</h3>
</div>


<?php
	}
	else
	{
		$before_login=true;
		include_once "menu.php";
?>
<div class="titulos">
<h3>Invalid Login!!! Try Again.</h3>
</div>

<?php
	}

	include_once "footer.php";
?>
