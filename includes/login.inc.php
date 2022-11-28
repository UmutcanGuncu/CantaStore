<?php
if(isset($_POST['login'])){
   $uid  = $_POST['uid'];
   $pwd = $_POST['pwd'];
   include ("../partials/connect.php");
   include ("functions.inc.php");
   if(emptyInputLogin($uid,$pwd)!==false)
  {
      header("location: ../login.php?error=emptyinput");
      exit();
  }
  loginUser($conn,$uid,$pwd);
}
