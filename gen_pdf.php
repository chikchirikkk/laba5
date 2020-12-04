<?php
require('pdf/tfpdf.php');

  $connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT h.Name, h.Strana, h.Classnadejnosti, r.Name1, r.proc_godovih, d.startovaya_summa 
FROM vkladi d INNER JOIN  progdepozit r ON d.id_prog = r.id JOIN bank h ON r.id_banka=h.id");

  $i = 0;
  $j = 0;
  while ($row = mysqli_fetch_array($result)){

    $number[$i] = $i+1;
    $Name[$i] = $row['Name'];
    $Strana[$i] = $row['Strana'];
    $Classnadejnosti[$i] = $row['Classnadejnosti'];
	$name[$i] = $row['Name1'];
	$proc_godovih[$i] = $row['proc_godovih'];
<?php
require('pdf/tfpdf.php');

  $connect = mysqli_connect("localhost", "f0475678_bank", "root", "f0475678_bank")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT h.Name, h.Strana, h.Classnadejnosti, r.Name1, r.proc_godovih, d.startovaya_summa 
FROM vkladi d INNER JOIN  progdepozit r ON d.id_prog = r.id JOIN bank h ON r.id_banka=h.id");

  $i = 0;
  $j = 0;
  while ($row = mysqli_fetch_array($result)){

    $number[$i] = $i+1;
    $Name[$i] = $row['Name'];
    $Strana[$i] = $row['Strana'];
    $Classnadejnosti[$i] = $row['Classnadejnosti'];
	$name[$i] = $row['Name1'];
	$proc_godovih[$i] = $row['proc_godovih'];
    $part[$i] = $row['startovaya_summa'];
	$part1[$i] = $row['startovaya_summa'];
	$name1[$i] = $row['Name1'];
    $i++;
	$j++;
  }
for ($k=0; $k<$i; $k++){
for ($m=$k+1; $m<$i; $m++) {
	if ($name[$k]==$name[$m])
	{ $part[$k]+= $part[$m]; 
$name[$m]=$name[$m]."1";}
}}
$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',10);


$txt = "Вклады";
$txt = "Ахметшин Р.Р.";
$pdf->SetFont('DejaVu','','28');
$pdf->Cell(199, 10, $txt, 15,0,'C');
$pdf->Ln();
$pdf->Ln();
 
 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(250,245,240); 
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(135,245,240); 
 $pdf->SetLineWidth(.1);
 
 $pdf->Cell(10,12,"№",1,0,'C',true);
 $pdf->Cell(35,12,"Наимен-ие банка",1,0,'C',true);
 $pdf->Cell(20,12,"Страна",1,0,'C',true);
 $pdf->Cell(40,12,"Класс надёжности",1,0,'C',true);
 $pdf->Cell(25,12,"Наз. прог.",1,0,'C',true);
 $pdf->Cell(25,12,"% годовых",1,0,'C',true);
 $pdf->Cell(45,12," Ст-ая сумма вклада",1,0,'C',true);
 $pdf->Ln();
 
$pdf->SetFillColor(250,245,240,1);
$pdf->SetTextColor(0);
$pdf->SetFont('');
 
$fill = true;
 
foreach($number as $i)
  {
    $pdf->SetFont('DejaVu','','10');
        $pdf->Cell(10,6, $i, 1, 0,'C',$fill);
        $pdf->Cell(35,6, $Name[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(20,6, $Strana[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(40,6, $Classnadejnosti[$i-1], 1, 0,'L',$fill);
		$pdf->Cell(25,6, $name1[$i-1], 1, 0,'L',$fill);
		$pdf->Cell(25,6, $proc_godovih[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(45,6, $part1[$i-1], 1, 0,'R',$fill);
        $pdf->Ln();

    }
	$pdf->Ln();
	 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(250,245,240);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(135,245,240);
 $pdf->SetLineWidth(.1);
	$pdf->Cell(30,12,"Тип вклада",1,0,'C',true);
	$pdf->Cell(70,12,"Сумма всех вкладов такого типа",1,0,'C',true);
	$pdf->Ln();
	$pdf->SetFillColor(250,245,240,1);
$pdf->SetTextColor(0);
$pdf->SetFont('');
	for ($k=0; $k<$i; $k++){
			if (( mb_substr($name[$k],-1)!= "1")){
		 $pdf->Cell(30,6,$name[$k],1,0,'C',true);
	$pdf->Cell(70,6, $part[$k], 1, 0,'R',$fill);
	$pdf->Ln();
	}}

   // $pdf->Cell(180,0,'','T');

$pdf->Output();
?>