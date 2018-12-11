<?php
	include 'session.php';
	include 'connection.php';
	
	if(!empty ($_SESSION['auth']))
	{
		echo 'welcome'. '<br>';
		include 'search.php';
		
?>
			<br><br><a href = "logout.php">logout</a>
<?php
	}
	else
	{
		include 'noaut.php';
	}
	
	
	
	