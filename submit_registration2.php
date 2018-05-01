<?php
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['need_pin']) && isset($_POST['submit']) && isset($_POST['pin']) )
		{
			if ($_SESSION['need_pin'] == "need")
			{
				$i = 0;
				$d = 0;
				if (!(file_exists("../private")))
					mkdir("../private", 0777, true);
				$arr = unserialize(file_get_contents("../private/passwd"));
					foreach ($arr as $inarr) { 
						if ($inarr['login'] == $_SESSION['login']) {
							$i++;
							if ($_POST['pin'] == $inarr['pin'])
							{
								$inarr['success'] = true;
								$_SESSION['sing-in'] = "sing-in";
								$d++;
								header("Location: index.php?crt=1&i=".$i."&d=".$d,TRUE,301);
								exit ;
							}
						}
				}
											header("Location: index.php?crt=0",TRUE,301);
								exit ;	

			}			
		}
		else
			echo "(((((";
		header("Location: index.php?crt=0",TRUE,301);

?>