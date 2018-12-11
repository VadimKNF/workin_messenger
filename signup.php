<?php
	
	include 'session.php';
	include 'connection.php';
	include 'loginform.php';
	
	if(!empty($_POST['login']) and !empty($_POST['password']))
	{
		$login = strip_tags($_POST['login']);
		$password = strip_tags($_POST['password']);
		
		$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
		$result = mysqli_query($link, $query);
		
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user))
		{
			$_SESSION['auth'] = $login;
			header('Location: index.php');
		}
		else
		{
			echo 'wrong credentials';
		}
	}
	
	