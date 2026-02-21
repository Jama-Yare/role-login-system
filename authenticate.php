<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin'){
        header("Location: admin.php");
    }
    elseif($user['role'] == 'captain'){
        header("Location: captain.php");
    }
    elseif($user['role'] == 'warden'){
        header("Location: warden.php");
    }
    elseif($user['role'] == 'officer'){
        header("Location: officer.php");
    }
}
else{
    echo "Invalid Email or Password";
}
?>