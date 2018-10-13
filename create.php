<?php
	session_start();
	if ($_POST['submit'] === "OK") {
		if (isset($_POST['login']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) &&  isset($_POST['email'])) {



			$login = $_POST['login'];
			$email = $_POST['email'];
			$passwd = hash("whirlpool", $_POST['psw']);
			$pas_2 =  hash("whirlpool", $_POST['psw-repeat']);
			if (strlen($_POST['psw']) < 8 || ($_POST['psw-repeat'] != $_POST['psw']))
			{
					header("Location: index.php?create=erroroPASS",TRUE,301);
					exit ;
			}
			$pin = rand(1000,9999);


			$host = "localhost";
			$user = "root";
			$passwd_db = "123123";
			$dbname = "camagru";
			
			try {
			    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd_db);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "INSERT INTO users (name, password, email, validate, to_mail, pin) VALUES ('$login','$passwd','$email',2,1,$pin)";
			    // use exec() because no results are returned
			    $conn->exec($sql);
			    echo "New record created successfully";
			    }
			catch(PDOException $e)
			    {
			    	echo $sql . "<br>" . $e->getMessage();
			    				$conn = null;
			    //header("Location: index.php?create=pzdc",TRUE,301);
			    exit ;
			    }
			
			$conn = null;



			$_SESSION['login'] = $login;
			$msg = "pin for reg".rand(1000,9999);
			// use wordwrap() if lines are longer than 70 characters
			$msg = wordwrap($msg,70);
			$msg = "pin for reg".$pin;
			mail($email,"PRIVET",$msg);
			$_SESSION['need_pin'] = "need";
			header("Location: submit_registration.php",TRUE,301);
			exit ;



		}
		else {
			header("Location: index.php?create=errorempty2",TRUE,301);
			exit ;
		}
	}
	else {
		header("Location: index.php?create=errorempty1",TRUE,301);
		exit ;
	}
?>
