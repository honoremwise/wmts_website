<?php
//linking whith the db connection file
  include('dbcon.php');
  $statusmsg="";
    if(isset($_POST['adduser']))
  {
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $title=$_POST['title'];
  // creating a default encrypted password
  $password=md5(substr($_POST['firstname'], 0,2).substr($_POST['lastname'], -2).substr($_POST['telephone'], -2));
  echo date("Y-m-d");
  //Adding data in users' table
  $insert="insert into users (firstname,lastname,tel,email,status,password) values('$firstname','$lastname','$telephone','$email','pending','$password')";
  $dbinsertuser=mysqli_query($con,$insert);
  if(!$dbinsertuser)
  {
$statusmsg = mysqli_error($con);
  }
  else{
  $statusmsg="user inserted";
  }


  }
?>
