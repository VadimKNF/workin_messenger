<?php
include 'session.php';
include 'connection.php';
include 'loginform.php';

$title = 'регистрация';

	if(!empty($_POST['login']) and !empty($_POST['password']))
	{
		$login = strip_tags($_POST['login']);
		$password = strip_tags($_POST['password']);
		
		$query = "INSERT INTO users SET login='$login', password='$password'";
		mysqli_query($link, $query);
		
		$_SESSION['auth'] = $login;
			
		header('Location: index.php');
	}