<?php
 // Подключение к базе данных:
$connect1 = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect1, "SET NAMES utf8");
$get_naz = $_GET['Naz'];
	$name = substr($_GET['Naz'], 0, (strlen($_GET['Naz'])-1));
	$num = substr($_GET['Naz'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;

$sql_add = "INSERT INTO progdepozit SET Name1='".$_GET['Name1']."', proc_godovih='".$_GET['proc_godovih']."', id_banka='" .$str ."', Naz_banka='" .$name."'";

mysqli_query($connect1, $sql_add);
 if (mysqli_affected_rows($connect1)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, вы зарегистрировали программу в базе данных.";
 print "<p><a href=\"lab-4-55.php\"> Вернуться к списку банков </a>"; }
 else { print "Ошибка сохранения.".mysqli_error($connect1)." <a href=\"lab-4-55.php\"> Вернуться к списку банков </a>"; }
?>

