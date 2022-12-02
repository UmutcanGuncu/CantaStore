<?php
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
function  loginAdmin($conn,$uid,$pwd)
{
    $uidExits= uidExit($conn,$uid);

    if($uidExits ===false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $uidExits["admin_password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd===false)
    {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }else if($checkPwd ===true){
        session_start();
        $_SESSION['adminId']=$uidExits["admin_id"];
        $_SESSION['adminUid']=$uidExits["admin_uid"];
        header("location: ../adminIndex.php");
        exit();
    }
}
function uidExit($connect,$username)
{
    $sql = "SELECT * FROM admin WHERE admin_uid = ? ;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
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