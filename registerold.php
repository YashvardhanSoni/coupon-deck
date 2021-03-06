<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $review = $_POST['review'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password", $password, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
                header('location: index.php');
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>
<html>
<head>
  <title>Register</title>
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
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
      border-radius: 25px;
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
input[type=text]{

    border: none;
    background: lightgrey;
}
input[type=password]{

    border: none;
    background: lightgrey;

}
input[type=email]{

    border: none;
    background: lightgrey;

}
button[type=submit]{
  border-radius: 25px;
  background: orange;
}
.form_align{ }

@media screen and (max-width: 390px){
.form_align{
  margin-top: 50%;
}
}


</style>
</head>
<div class="form_align">
<h4 align="center" style="font-size:3.0vw; padding: 25px;  "><span style="color:orange;"><b>Create Account</span></b></h4><br>
<h1 id="logo" class="rs">
<a href="index.html">
<img src="images/logo.png" alt="CouponDeck"/>
</a>
</h1>

<form method="post" action="" name="signup-form">
<div class="form-element">
  <i class="fa fa-user icon"></i>
<input type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="Username" required />
</div>
<div class="form-element">
<i class="fas fa-envelope"></i>
<input type="email" name="email"  placeholder="Email" required />
</div>
<div class="form-element">
  <i class="fa fa-key icon"></i>
<input type="password" name="password"  placeholder="Password" required />
</div>
<button type="submit" name="register" value="register">Sign up</button>
<br><br><a align="left" href="login.php" style="color:orange;">Already Registered? Login Here</a>
</form>
</div>
