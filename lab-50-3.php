<html>
<head
<title> Редактирование данных о вкладе</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 $rows=mysqli_query($connect, "SELECT   data_create, Naz_prog, 	startovaya_summa FROM vkladi WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
// $date = $st['date'];
 $date = date_format(date_create_from_format('Y-m-d', $st['date']),'d.m.Y');
 $start_sum = $st['start_sum'];
 $Naz_prog = $st['Naz_prog'];
 }
print "<form action='lab-50-4.php' metod='get'>";
print "Дата создания вклада: <input name='data_create' size='20' type='date'value='".$data_create."'>";
print "<br>% годовых: <input name='startovaya_summa' size='20' type='int'value='".$startovaya_summa."'>";
 $rows1=mysqli_query($connect, "SELECT id, Name1 FROM progdepozit ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $Naz[$i] = $st['Name1'];
            $id_b[$i] = $st['id'];
            $i++;
        }
?>

<br>Наименование программы депозита:
<select name='Naz'>
        <?php
        for($i = 0; $Naz[$i] != null; $i++): ?>
            <option value="<?=$Naz[$i].$i?>"><?=$Naz[$i]?></option>
        <?php endfor;
        for($i = 0; $Naz[$i] != null; $i++){
$name = "num_res". $i;
$value = "" . $id_b[$i];
print "<input type='hidden' name='".$name."' value='".$value."'>";
}
        ?>
        </select>
<?php
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lab-4-55.php\"> Вернуться к списку банков </a>";
?>
</body>
</html>
