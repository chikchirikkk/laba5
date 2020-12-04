<html> <body>
<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");  
$get_name = $_GET['Naz'];
	$name = substr($_GET['Naz'], 0, (strlen($_GET['Naz'])-1));
	$num = substr($_GET['Naz'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;
 $zapros1="UPDATE progdepozit SET Name1='".$_GET['Name1']."', proc_godovih='".$_GET['proc_godovih']."', id_banka='".$str."', Naimenovanie_banka='" .$name."' where id='".$_GET['id']."'";
 mysqli_query($connect, $zapros1);
 if (mysqli_affected_rows($connect)>0) {
 echo 'Все сохранено. <a href="lab-4-55.php"> Вернуться к списку пользователей </a>'; }
 else { echo "Ошибка сохранения.".mysqli_error($connect)." <a href=\"lab-4-55.php\"> Вернуться к списку банков </a>"; }

?>
</body> </html>
