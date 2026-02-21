<?php
session_start();
if($_SESSION['role'] != 'warden'){
    header("Location: login.php");
}
?>

<h1>Warden Dashboard</h1>
<p>Welcome <?php echo $_SESSION['user']; ?></p>

<a href="logout.php">Logout</a>