<?php
if(isset($_POST["register"]))
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwdRepeat"];
  
  require_once '../partials/connect.php';
  require_once 'functions.inc.php';
  if(emptyInputSignUp($name,$email,$username,$password,$passwordRepeat)!==false)
  {
      header("location: ../register.php?error=emptyinput");
      exit();
  }
  if(invalidUid($username)!==false)
  {
      header("location: ../register.php?error=invaildUid");
      exit();
  }
  if(invalidEmail($email)!==false)
  {
      header("location: ../register.php?error=invaildEmail");
      exit();
  }if(pwdMatch($password,$passwordRepeat)!==false)
  {
      header("location: ../register.php?error=passwordsdontmatch");
      exit();
  }
  if(uidExits($conn,$username,$email)!==false)
  {
      header("location: ../register.php?error=usernameataken");
      exit();
  }  
  createUser($name,$email,$username,$password,$conn);
      
}else
{
    header("location: ../register.php");
    exit();
}