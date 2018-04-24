<?php
	include 'auth.php';
		
	if ($_POST['submit'] === "OK") {
		if ($_POST['login']) {
			if (!$_POST['psw']) {
				header("Location: index.php?create=errorempty3",TRUE,301);
				exit ;
			}
			if (!(file_exists("../private")))
				mkdir("../private", 0777, true);
			$login = $_POST['login'];
			$email = $_POST['email'];
			$passwd = hash("whirlpool", $_POST['psw']);
			$arr = unserialize(file_get_contents("../private/passwd"));
			foreach ($arr as $inarr) {
				if ($inarr['login'] == $login || $inarr['email'] == $email) {
					header("Location: index.php?create=erroroldlogin",TRUE,301);
				exit ;
				}
			}
			$new_arr = array('login' => $login, 'passwd' => $passwd, 'email' => $email, 'phone' => $phone, 'admin' => 2);
			$arr[] = $new_arr;
			file_put_contents('../private/passwd', serialize($arr));
			echo "OK" . PHP_EOL;
			header("Location: index.php?create=success",TRUE,301);
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
