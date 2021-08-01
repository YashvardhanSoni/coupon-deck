<?php
session_start();
include('config.php');
if (isset($_POST['register'])) {
$review = $_POST['review'];
$query = $connection->prepare("SELECT * FROM users WHERE review=:review");
$query->bindParam("review", $review, PDO::PARAM_STR);
$query->execute();
if ($query->rowCount() == 0) {
    $query = $connection->prepare("INSERT INTO users(username,password,email,review) VALUES (:username,:password,:email,:review)");
    $query->bindParam("username", $username, PDO::PARAM_STR);

    $query->bindParam("review", $review, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        echo '<p class="success">Your registration was successful!</p>';
        header('location: New_index.php');
    } else {
        echo '<p class="error">Something went wrong!</p>';
    }
}
}
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



<html>

<head>
  <title>Submit Review</title>
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

@media screen and (max-width: 390px){
.form_align{
  margin-top: 50%;
}
}


</style>
<div class="form_align">
</head>
<h4 align="center" style="font-size:3.0vw; padding: 25px;"><span style="color:orange;"><b>Hello !</span><br><span style="color:rgba(5,167,201,1);"><b>Your Feedback is Valueable to Us.</span></b></h4>
<h1 id="logo" class="rs">
<a href="index.html">
<img src="images/logo.png" alt="CouponDeck"/>
</a>
</h1>
<form method="post" action="" name="review-form">
  <div class="form-element">
    <i class="fa fa-user icon"></i>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+"  value="<?php echo $_SESSION['username']; ?>"  disabled required />
  </div>
  <div class="form-element">
<i class="fa fa-pen icon"></i>
    <input type="text" name="review"  placeholder="Write Review Here !"  required />
  </div>
  <button type="submit" name="submit" value="submit">Submit</button>

</form>
</div>
