<html> <body>
<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");  
$get_naz = $_GET['Naz'];
	$name = substr($_GET['Naz'], 0, (strlen($_GET['Naz'])-1));
	$num = substr($_GET['Naz'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;
 $date = date_format(date_create_from_format('Y-m-d', $_GET['date']),'d.m.Y');
 $zapros1="UPDATE vkladi SET data_create='".$_GET['date']."', 	startovaya_summa='".$_GET['startovaya_summa']."', id_prog='".$str."', Naz_prog='" .$name."' where id='".$_GET['id']."'";
 mysqli_query($connect, $zapros1);
 if (mysqli_affected_rows($connect)>0) {
 echo 'Все сохранено. <a href="lab-4-55.php"> Вернуться к списку пользователей </a>'; }
 else { echo "Ошибка сохранения.".mysqli_error($connect)." <a href=\"lab-4-55.php\"> Вернуться к списку банков </a>"; }

?>
</body> </html>
