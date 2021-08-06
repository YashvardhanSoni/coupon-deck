<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     $_SESSION['msg'] = "You have to log in first";
//     header('location: login.php');
// }
// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['username']);
//     header("location: login.php");
//
// }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="bootstrap.css"/>
      <link rel="icon" href="images/logo.ico" type="image/icon type">
      <link rel="stylesheet" href="bootstrap.min.css"/>
      <link rel="stylesheet" href="css/dropdown.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title></title>
    <style>
    /*Trigger Button*/
    .login-trigger {
      font-weight: bold;
      color: #fff;
      background: linear-gradient(to bottom right, #B05574, #F87E7B);
      padding: 9px 20px;
      border-radius: 30px;
      position: relative;
      top: 50%;
    }
    /*Modal*/
    h4 {
      font-weight: bold;
      color: #fff;
    }
    .close {
      color: #fff;
      transform: scale(1.2)
    }
    .modal-content {
      font-weight: bold;
      background: linear-gradient(to bottom right,#F87E7B,#B05574);
    }
    .form-control {
      margin: 1em 0;
    }
    .form-control:hover, .form-control:focus {
      box-shadow: none;
      border-color: #fff;
    }
    .username, .password {
      border: none;
      border-radius: 0;
      box-shadow: none;
      border-bottom: 2px solid #eee;
      padding-left: 0;
      font-weight: normal;
      background: transparent;
    }
    .form-control::-webkit-input-placeholder {
      color: #eee;
    }
    .form-control:focus::-webkit-input-placeholder {
      font-weight: bold;
      color: #fff;
    }
    .login {
      padding: 6px 20px;
      border-radius: 20px;
      background: none;
      border: 2px solid #FAB87F;
      color: #FAB87F;
      font-weight: bold;
      transition: all .5s;
      margin-top: 1em;
    }
    .login:hover {
      background: #FAB87F;
      color: #fff;
    }
    .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-image: "C:\xampp\htdocs\mmipl\images\ex\fbanner.jpg";
   color: white;
   text-align: center;
}
footer img{
  max-width: 100%;
background-size:100% auto;
}
.login-button {
    margin-bottom:10px;
  }
  body {
    background-image: url('bg.png');
    background-repeat: no-repeat;
    background-size: cover;
    line-height: 0;
  }

  #myDropdown {
    margin-left: -27px;
    margin-top: 5px;
  }
  .dropdown-content{
    text-align: left;
  }
    </style>
</head>

<body>

<h3 style="padding-top: 70px;" align="center" style="font-size:4.8vw;">
  <span style="color:lightyellow;"><b>Hello</span>
    <span style="color:white; text-shadow: 0 0 5px #FF0000, 0 0 5px #0000FF;">
    <?php
        if (!isset($_SESSION['username'])){
      echo strtoupper("Please Login First to Select region !") ;}
      else{
        echo strtoupper($_SESSION['username']." !") ;
      }
    ?>
  </span>
  <h4 align="center" style="font-size:3.0vw; "><span style="color:lightyellow;"><b>Please Select </span> <span style="color:lightyellow;">Region</span> <span style="color:lightyellow;">to Continue</span></b></h4>
  </b>
</h3>
<center>
  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn" style="border-radius: 25px; height: 50px; width: 100px;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/globe--v1.png"/> Regions</button>
  <div id="myDropdown" class="dropdown-content">
  <a href="ind_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/india-circular.png"/> <b><big>India</big></b></a>
  <!-- <a href="uae_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/united-arab-emirates-circular.png"/> <b><big>UAE</big></b></a>
  <a href="singapore_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/singapore-circular.png"/> <b><big>Singapore</big></b></a>
  <a href="russia_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/emoji/48/000000/russia-emoji.png"/> <b><big>Russia</big></b></a>
  <a href="vietnam_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/vietnam-circular.png"/> <b><big>Vietnam</big></b></a>
  <a href="saudiarab_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/saudi-arabia-circular.png"/> <b><big>Saudiarab</big></b></a>
  <a href="belarus_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/belarus-circular.png"/> <b><big>Belarus</big></b></a>
  <a href="malaysia_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/malaysia-circular.png"/> <b><big>Malaysia</big></b></a>
  <a href="indonesia_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/indonesia-circular.png"/> <b><big>Indonesia</big></b></a>
  <a href="thailand_home.php" style="color:white; text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"><img height="15px" width="15px" src="https://img.icons8.com/color/48/000000/thailand-circular.png"/> <b><big>Thailand</big></b></a> -->
  </div>
</center>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
