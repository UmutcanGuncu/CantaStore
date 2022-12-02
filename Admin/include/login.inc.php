<?php
if(isset($_POST['admin_login'])){
    session_start();
    $uid  = $_POST['adminUid'];
    $pwd = $_POST['password'];
    include ("connect.php");
    include ("functions.inc.php");
    if(emptyInputLogin($uid,$pwd)!==false)
    {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginAdmin($conn,$uid,$pwd);
}