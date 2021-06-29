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
        if (!$result) {
            echo '<p class="error">Username/Password is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email'] = $result['email'];
                session_set_cookie_params(0);
                header("Location: index.php");
            } else {
                echo '<p class="error">Username/Password is wrong!</p>';
            }
        }
    }
?>


<html>
<title>Login</title>
<link rel="icon" href="images/logo.ico" type="image/icon type">
<head>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
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
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
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


</style>
</head>
<h1 id="logo" class="rs">
<a href="index.html">
<img src="images/logo.png" alt="CouponDeck"/>
</a>
</h1>
<form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="Enter Valid UserName"  required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password"  placeholder="Enter Valid Password"  required />
  </div>
  <button type="submit" name="login" value="login">Log In</button>
</form>

<form action="/regform/register.php">
  <input type="button" onclick="location.href='./register.php';" value="New User, Register Here" />
</form>
