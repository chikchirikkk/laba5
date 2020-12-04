<html>
<head
<title> Редактирование данных о банке</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");
 $rows=mysqli_query($connect, "SELECT  Name1, proc_godovih, Naimenovanie_banka FROM progdepozit WHERE id=".$_GET['id']);
 while ($st = mysqli_fetch_array($rows)) {
 $id=$_GET['id'];
 $Name = $st['Name1'];
 $Proz = $st['proc_godovih'];
 $Naz_banka = $st['Naimenovanie_banka'];
 }
print "<form action='lab-5-4.php' metod='get'>";
print "Название: <input name='Name1' size='20' type='varchar'value='".$Name1."'>";
print "<br>% годовых: <input name='proc_godovih' size='20' type='varchar'value='".$proc_godovih."'>";
 $rows1=mysqli_query($connect, "SELECT id, Name FROM bank ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $Naz[$i] = $st['Name'];
            $id_b[$i] = $st['id'];
            $i++;
        }
?>

<br>Наименование банка:
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
