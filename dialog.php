<?php
include 'session.php';
include 'connection.php';
	if(!empty($_SESSION['auth']))
	{
		$senderLogin = $_SESSION['auth'];
		if(!empty($_GET['receiver']))
		{
			$receiver = strip_tags($_GET['receiver']);	
			$querySended = "SELECT * FROM dialogs WHERE sender_login='$senderLogin' AND receiver_login='$receiver'";
			$resultSended = mysqli_query($link, $querySended) or die(mysqli_error($link));
			for ($data = []; $row = mysqli_fetch_assoc($resultSended); $data[] = $row);
			//var_dump($data);
			$resultSended='';
			foreach($data as $elem)
			{
				$resultSended .= $elem['message'].'<br><br>';
			}
			echo 'я: <br>' . $resultSended;
			
			
			$queryReceived = "SELECT * FROM dialogs WHERE sender_login='$receiver' AND receiver_login='$senderLogin'";
			$resultReceived = mysqli_query($link, $queryReceived) or die(mysqli_error($link));
			for ($data = []; $row = mysqli_fetch_assoc($resultReceived); $data[] = $row);
			//var_dump($data);
			$resultReceived ='';
			foreach($data as $elem)
			{
				$resultReceived .= $elem['message'].'<br><br>';
			}
			echo $receiver . ':<br>' . $resultReceived;
			
			include 'dialogform.php';
			if(!empty($_POST['message']))
			{
				$message = strip_tags($_POST['message']);
				$query = "INSERT INTO dialogs SET sender_login='$senderLogin', receiver_login='$receiver', message='$message'";
				mysqli_query($link, $query);
				
			}
		}
	}	
		else
	{
		include 'noaut.php';
	}