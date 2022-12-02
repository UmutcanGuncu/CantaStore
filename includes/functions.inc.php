<?php
include ("../partials/connect.php");
session_start();
function createUser($name,$email,$username,$password,$connect)
{
    mysqli_report(MYSQLI_REPORT_STRICT);
    $sql = "INSERT INTO users(user_name,user_email,userUid,user_password) VALUES(?,?,?,?) ";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
       header("location: ../register.php?error=none");
       exit();
   }
   $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$username,$hashedPwd);
   mysqli_stmt_execute($stmt);
   $resultData = mysqli_stmt_get_result($stmt);
   header("location: ../login.php");
   
   
   
}
function uidExits($connect,$username,$email)
{
   $sql = "SELECT * FROM users WHERE useruid = ? or user_email =?;";
   $stmt = mysqli_stmt_init($connect);
   if(!mysqli_stmt_prepare($stmt, $sql)){
       header("location: ../register.php?=stmtfailed");
       exit();
   }
   mysqli_stmt_bind_param($stmt, "ss", $username,$email);
   mysqli_stmt_execute($stmt);
   $resultData = mysqli_stmt_get_result($stmt);
   if($row = mysqli_fetch_assoc($resultData))
   {
       return $row;
   }else{
       $result = false;
       return $result;
   }
   mysql_stmt_close($stmt);
}
function pwdMatch($password,$passwordRepeat)
{
    $result;
    if($password !==$passwordRepeat)
    {
        $result = true;
    }
    else{
      $result = false;  
    }
    return $result;
}
function invalidEmail($email)
{
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else{
      $result = false;  
    }
    return $result;
}
function invalidUid($username)
{
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    else{
      $result = false;  
    }
    return $result;
}
function emptyInputSignUp($name,$email,$username,$password,$passwordRepeat)
{
    $result;
    if(empty($name)||empty($email)||empty($username)||empty($password)||empty($passwordRepeat))
    {
        $result = true;
    }
    else{
      $result = false;  
    }
    return $result;
}
function emptyInputLogin($username,$password)
{
    $result;
    if(empty($username)||empty($password))
    {
        $result = true;
    }
    else{
      $result = false;  
    }
    return $result;
}
function  loginUser($conn,$uid,$pwd)
{
   $uidExits= uidExits($conn,$uid,$uid);
   
   if($uidExits ===false){
       header("location: ../login.php?error=wrongLogin");
      exit();
   }
    
    $pwdHashed = $uidExits["user_password"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if($checkPwd===false)
    {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }else if($checkPwd ===true){
        session_start();
        $_SESSION['userId']=$uidExits["user_id"];
        $_SESSION['userUid']=$uidExits["userUid"];
        $_SESSION['user_name']=$uidExits["user_name"];
        header("location: ../adminIndex.php");
        exit();
    }
}
