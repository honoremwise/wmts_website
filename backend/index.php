<?php
include('_/dbcon.php');
if(!isset($_SESSION))
   {
       session_start();
   }
  $statusmsg="";
  $statusmsgtext="";
if(isset($_POST['lgnbtn']))
{
$email=$_POST['email'];
$password=$_POST['password'];
//checking users's availability
$getuser=mysqli_query($con,"select * from users where email= '$email' and password = '$password'") or die(mysqli_error($con));
if(mysqli_num_rows($getuser)>0)
{
$_SESSION["email"]=$email;
  $statusmsgtext="<center><font color=blue><b>"."Access granted"."</b></font></center>";
echo"<script>
setInterval(() => {
window.location='_/'
}, 1000);
</script>";
}
else {
  $statusmsgtext="<center><font color=red><b>"."user not found in our data"."</b></font></center>";
  echo"<script>
  setInterval(() => {
  window.location='index.php'
}, 1000);
  </script>";
  }
}
?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WMTS | Rwanda</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="_/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="_/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<style>
body {

  /* background-image: url('bg.png');
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; */
  /* background-color: whit */

}
</style>

  <body class="bg-info">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                  <div class="login-form">
                    <form method="post" action="#">
                      <?php echo $statusmsg;
                      echo "<br>"."$statusmsgtext";?>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email"  name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="lgnbtn">Login</button>
                                                                </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="_/assets/js/main.js"></script>

</body>
</html>
