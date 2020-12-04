<!DOCTYPE html>
<html>
	<body>
<html>
<head> <title> Добавление новой  программы </title> </head>
<body>
<H2>Добавление новой  программы:</H2> 
<form action="lab-5-2.php" metod="get">
 Название: <input name="Name1" size="20" type="varchar">
<br>% годовых: <input name="proc_godovih" size="20" type="varchar">
<br>
<?php
$connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
mysqli_query($connect, "SET NAMES utf8");

 $rows=mysqli_query($connect, "SELECT id, Name FROM bank ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows)) {
            $Naz[$i] = $st['Name'];
            $id_b[$i] = $st['id'];
            $i++;
        }
        ?>
<form action='lab5-2.php' metod='get'>
        Наименование банка:<br>
        <select  name='Naz'>
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
        </select><br>
</textarea>
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
</form>
<p>
<a href="lab-4-55.php"> Вернуться к списку программ </a>
</body>
</html>
