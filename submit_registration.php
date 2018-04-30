<?php
  session_start();
 ?>
<html>
<head>
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
    display: block; /* Hidden by default */
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






<!-- END GRID -->
</div>





<div id="create-form" class="modal">
  <form class="modal-content animate" method="POST" action="submit_registration2.php">
    <div class="container">
      <h1>Enter pin</h1>
      <hr>
      <label for="pin"><b>pin</b></label>
      <input type="text" placeholder="Enter pin" name="pin" required>
       <button type="submit" name="submit" value="OK" class="signupbtn">enter</button>
    </div>
  </form>
</div>
<!-- END MAIN -->
</div>





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
