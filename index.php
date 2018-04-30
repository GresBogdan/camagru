<?php
  session_start();
  include'DB.php';
 ?>
<html>
<head>
  <title>Camagru</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

h3, p {
  color: #984c46;
}
body {
    background-color: #984c46;
    padding: 20px;
    font-family: Arial;
}

/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}
 hr 
h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
  background-color: #17121f;
    margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
  background: #e9c87b;
    float: left;
    width: 25%;
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: #23323b;
    padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
    .column {
        width: 50%;
    }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}


input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #23323b;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: 100%;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
  background-color: #e9c97a;
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 62%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 1s;
    animation: animatezoom 1s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}




</style>
</head>
<body>

<!-- MAIN (Center website) -->
<div class="main">

<h1 >Camagru
<?php 
    if(isset($_SESSION['login']) && isset($_SESSION['sing-in'])  && $_SESSION['sing-in'] == "sing-in")
      echo $_SESSION['login'];
    else if (!isset($_SESSION['login']))
      echo "plz1";
    else if (!isset($_SESSION['sing-in']))
      echo "plz 2".session_save_path();
    else if ($_SESSION['sing-in'] != "sing-in") 
      echo "plz 3".$_SESSION['sing-in'];
    else 
      echo "plz";
?>
  
</h1>
<hr>
<div class="row">
  <div class="column">
    <button onclick="document.getElementById('login-modal').style.display='block'" style="width:100%;"><dic style="color:#984c46 " >Login</dic></button>
  </div>
  <div class="column">
    <button onclick="document.getElementById('create-form').style.display='block'" style="width:100%;"><div style="color:#984c46 " >create account</button>
  </div>
    <div class="column">
    <button onclick="document.getElementById('upload-form').style.display='block'" style="width:100%;"><div style="color:#984c46 " >add photo</button>
  </div>
      <div class="column">
    <button onclick="document.getElementById('001').style.display='block'" style="width:100%;"><div style="color:#984c46 " >add photo</button>
  </div>
</div>
<hr>


<div class="row">
  <p>Most popular photos</p>
</div>
<hr>
<!-- Portfolio Gallery Grid -->
<div id="001" class="row">
  <div class="column">
    <div class="content">
      <img src="mark-zuckerberg-congreso.jpg" alt="Mountains" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="1" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Lights" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="2" onclick="changeImage(this.id)" src="for_like.png"> 150 <a> coment</a>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Nature" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="3" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Mountains" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="4" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
      <img src="mark-zuckerberg-congreso.jpg" alt="Mountains" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="5" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Lights" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="6" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Nature" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="7" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="mark-zuckerberg-congreso.jpg" alt="Mountains" style="width:100%">
      <h3>login</h3>
      <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
            <img id="8" onclick="changeImage(this.id)" src="for_like.png"> 150
    </div>
  </div>
<!-- END GRID -->
</div>



<div id="login-modal" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">


    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color: #e9c97a">
            <div><span class="psw">Forgot <a href="#">password?</a></span></div>
      <button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<!-- END MAIN -->
</div>

<div id="create-form" class="modal">
  <form class="modal-content animate" method="POST" action="create.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Login</b></label>
      <input type="text" placeholder="Enter Login" name="login" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

      <div class="clearfix" >
        <button type="button" onclick="document.getElementById('create-form').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" value="OK" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>


<div id="welcome-form" class="modal">
  <form class="modal-content animate" >
    <div class="container">
        <p id="welcome_txt"></p>
        <button type="button" onclick="document.getElementById('create-form').style.display='none'" class="cancelbtn">Cancel</button>


    </div>
  </form>
</div>

<div id="upload-form" class="modal">
    <form class="modal-content animate" action="upload.php" method="post" enctype="multipart/form-data">
      <div class="container">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload Image" name="submit">
      </div>
    </form>
</div>
<?php
echo "<hr>";
echo "<div class=\"row\">";
echo "  <p id=\"test\">teasdasdst<p>";
echo "</div>";
echo "<hr>";

?>







<script>
// Get the modal
    var modal01 = document.getElementById('login-modal');
    var modal02 = document.getElementById('create-form');
    var modal03 = document.getElementById('upload-form');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal01) {
            modal01.style.display = "none";
        }
        else if (event.target == modal02) {
            modal02.style.display = "none";
        }
        else if (event.target == modal03) {
          modal03.style.display = "none";
        }
    }

    function changeImage(need_id) {

        if (document.getElementById(need_id).src.indexOf("for_like.png") !== -1) 
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById(need_id).src = "liked.png";
                document.getElementById('test').innerHTML = this.responseText;
              }};
              xhttp.open("GET", "liked.php?do=p&id="+need_id, true);
              xhttp.send();
            }
        else 
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById(need_id).src = "for_like.png";
                document.getElementById('test').innerHTML = this.responseText;
              }};
              xhttp.open("GET", "liked.php?do=-&id="+need_id, true);
              xhttp.send();
            }
        }
    function registration() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('Welcome').style.display = "block";
          if (this.responseText !== "E_RROR")
            document.getElementById("welcome_txt").innerHTML = "Welcome" + this.responseText;
          else
            document.getElementById("welcome_txt").innerHTML = "wrong filling";
        }
      };
      xhttp.open("GET", "registration.php?do=r&login="+need_id, true);
      xhttp.send();
    }
</script>
</body>
</html>
