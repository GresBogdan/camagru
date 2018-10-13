<?php
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['need_pin']) && isset($_POST['submit']) && isset($_POST['pin']) ) {
            if ($_SESSION['need_pin'] == "need") {






            $needLogin = $_SESSION['login'];
            $servername = "localhost";
            $username = "root";
            $password = "123123";
            $dbname = "camagru";
            $needPin = "dada";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT pin FROM users where name='$needLogin' LIMIT 1"); 
                $stmt->execute();
            
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach($stmt->fetchAll() as $v) { 
                   $needPin =  $v['pin'];
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                header("Location: index.php?signin=error",TRUE,301);                
            }
            $conn = null;

            if ($_POST['pin'] == $needPin) {


                echo "dada";




                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $sql = "UPDATE users SET validate=3 WHERE name='$needLogin'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    echo $stmt->rowCount() . " records UPDATED successfully";
                    $_SESSION['sing-in'] = "sing-in";
                    header("Location: index.php?signin=success",TRUE,301);
                    exit ;
                    }
                catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage();
                    }
                
                $conn = null;
                header("Location: index.php?signin=success",TRUE,301);    
                exit ;





            }
            else {

                header("Location: submit_registration.php", TRUE, 200);
            }
    
        }
                  header("Location: index.php", TRUE, 200); 
    }
?>