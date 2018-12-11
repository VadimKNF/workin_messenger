<?php

if(!empty ($_SESSION['auth']))
{	
	include 'searchform.php';
	if(!empty($_GET['search']))
	{
		$search = strip_tags($_GET['search']);
		
		$query = "SELECT * FROM users WHERE login LIKE '%$search%'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		//var_dump($data);
			
		$result = '';
		foreach($data as $elem)
		{
			$x = $elem['login'];
			//$result .= '<tr>';
			$result .= "<a href=\"dialog.php?receiver=$x\" target=\"_blank\">$x</a>" .'<br>';
			//$result .= '</tr>';
		
			
		}
		echo $result;	
		
	}
}
	else
{
	include 'noaut.php';
	
}

