<?php

    session_start();
    if (isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: index.php');
    }
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo $result['password'];
        echo (password_verify($password, $result['password']));

        if (!$result) {
            echo '<p class="error">Username/Password is wrong!</p>' ;
        } else {
            if ($password == $result['password']) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email'] = $result['email'];
                session_set_cookie_params(0);
                header("Location: select_region.php");
            } else {
                echo '<p class="error">Username/Password is wrong!</p>';
            }
        }
    }
?>


<html>

<head>
  <title>EnterOTP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="images/logo.ico" type="image/icon type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    background: white;
    margin: 50px auto;
    text-align: center;
    width: 800px;
    /* background-image: url('fttr.jpg');
    background-repeat: no-repeat;
    background-size: cover; */
}
h1 {
    font-family: 'Passion One';
    font-size: 2rem;
    text-transform: uppercase;
}
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}
input {
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
    border-radius: 25px;
}
form {
    margin: 25px auto;
    padding: 20px;
    width: 500px;
}
div.form-element {
    margin: 20px 0;
}
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}
p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}
p.error {
    background: orangered;
}


input[type=button]{
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}

input[type=text]{

    border: none;
    background: lightgrey;
}
input[type=password]{

    border: none;
    background: lightgrey;

}
button[type=submit]{
  border-radius: 25px;
  background: orange;
}

.form_align{ }

@media screen and (max-width: 420px){

  .form_align {
    padding: 132px;
    margin-top: 333px;
    box-sizing: border-box;
}
}
}

</style>

</head>
<div class="form_align">
<div >
<div style="border-radius: 50px 50px 0px 0px; background:#19a4b7; width: 100%;">
<h1 id="logo" class="rs" >
<img src="keypad.png" alt="OTP"/>
</h1>
<h4 align="center" style="font-size:3.0vw; padding: 25px;"><span style="color:white;"><b>Enter Verification Code</span></b></h4>
</div>
<span><div  style="border-style: groove; border-color:#19a4b7; border-radius: 0px 0px 50px 50px; background-color: lightyellow; max ">
<form method="post" action="" name="signin-form">
  <div class="form-element">
    <input type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="OTP"  required maxlength="4"/>
  </div>
  <button type="submit" name="login" value="login">Submit</button>
</form></div>
</span>
</div>
</div>
