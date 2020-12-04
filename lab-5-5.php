<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank");
mysqli_query($connect, "SET NAMES utf8");
 $zapros="DELETE FROM progdepozit WHERE id=" . $_GET['id'];
 mysqli_query($connect, $zapros);
 header("Location: lab-4-55.php");
 exit;
?>