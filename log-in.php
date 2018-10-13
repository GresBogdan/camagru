<?php
	session_start();
	if (isset($_POST['login']) && isset($_POST['psw'])) {
		$login = $_POST['login'];
		$psw = hash("whirlpool", $_POST['psw']);
		echo $login;
		$needPin;
		$needLogin;
		$check;



			try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM users where name ='$login'"); 
                $stmt->execute();
            
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $v) { 
                   $needPin =  $v['password'];
                   $needLogin = $v['name'];
                   $check = $v['validate'];
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                //header("Location: index.php?signin=error",TRUE,301);                
            }
            $conn = null;
            if ($needPin == $psw && $needLogin == $_POST['login'] && $check == 3)
            {
            	$_SESSION['login'] = $_POST['login'];
				$_SESSION['sing-in'] = "sing-in";
				header("Location: index.php?signin=success",TRUE,301);
            }
            else if ($needPin == $psw && $needLogin == $_POST['login'] && $check == 2)
            {
				header("Location: submit_registration2.php",TRUE,301);
            }
            else
            {
            	$_SESSION['sing-in'] = false;
            	if ($needPin != $psw)
            		echo "pas: ".$needPin." ".$psw;
            	if ($needLogin != $$_POST['login'])
            		echo "login :".$needLogin." ".$_POST['login'];
					
				//header("Location: index.php?signin=(((",TRUE,301);
            }

	}
	else {
		//header("Location: index.php?signin=error",TRUE,301);
	}

?>



