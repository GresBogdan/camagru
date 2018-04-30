<?php
	session_start();
	if ($_POST['submit'] === "OK") {
		if (isset($_POST['login']) && isset($_POST['psw']) && isset($_POST['psw-repeat']) &&  isset($_POST['email'])) {
			if (!(file_exists("../private")))
				mkdir("../private", 0777, true);
			$login = $_POST['login'];
			$email = $_POST['email'];
			$passwd = hash("whirlpool", $_POST['psw']);
			$pas_2 =  hash("whirlpool", $_POST['psw-repeat']);
			if (strlen($_POST['psw']) < 6 || ($_POST['psw-repeat'] != $_POST['psw']))
			{
					header("Location: index.php?create=erroroPASS",TRUE,301);				
					exit ;
			}
			$arr = unserialize(file_get_contents("../private/passwd"));
			foreach ($arr as $inarr) {
				if ($inarr['login'] == $login || $inarr['email'] == $email) {
					header("Location: index.php?create=erroroldlogin",TRUE,301);
				exit ;
				}
			}
			$pin = rand(1000,9999);
			$new_arr = array('login' => $login, 'passwd' => $passwd, 'email' => $email, 'phone' => $phone, 'admin' => 2, 'pin' => $pin, 'success' == false);
			$arr[] = $new_arr;
			file_put_contents('../private/passwd', serialize($arr));
			echo "OK" .$email. PHP_EOL;
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
