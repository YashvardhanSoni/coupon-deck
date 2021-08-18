<?php
    session_start();
    include('config.php');
    require __DIR__.'/helper/common.php';
    $region = activeCountries();
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $review = $_POST['review'];
        $region = $_POST['region'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!<br>The Page will now Reload in <b>few sec</b>..</p>';
              header("refresh: 2; url = register.php");
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email,region) VALUES (:username,:password,:email,:region)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password", $password, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("region", $region, PDO::PARAM_STR);
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

  <!-- Facebook Pixel Code -->
  <!-- <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '303511618102911');
  fbq('track', 'PageView');

  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=303511618102911&ev=PageView&noscript=1"
  /></noscript> -->
  <!-- End Facebook Pixel Code -->


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
      outline:none;
}
select {
    border: none;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
      border-radius: 25px;
      background: #d3d3d3;
      outline:none;
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
    outline:none;
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
  outline:none;
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

<form autocomplete="off" method="post" action="" name="signup-form">
<div class="form-element">
  <i class="fa fa-user icon"></i>
<input autocomplete="off" type="text" name="username" pattern="[a-zA-Z0-9]+"  placeholder="Username" required />
</div>
<div class="form-element">
<i class="fas fa-envelope"></i>
<input autocomplete="off" type="email" name="email"  placeholder="Email" required />
</div>
<div class="form-element">
  <i class="fa fa-key icon"></i>
<input autocomplete="off" type="password" name="password"  placeholder="Password" required />
</div>
<div class="form-element">
  <i class="fa fa-globe icon"></i>
    <select name="region" id="region" style="width:310px;">
        <option value="">Select Region</option>
        <?php if(!empty($region['results'])){
            foreach($region['results'] as $index){ ?>
            <option value="<?php echo $index['code']; ?>"><?php echo $index['country']; ?></option>
        <?php   } } ?>
    </select>
</div>
<button type="submit" name="register" value="register">Submit</button>
<br><br><a align="left" href="login.php" style="color:orange;">Already Registered? Login Here</a>
</form>
</div>
