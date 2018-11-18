<!DOCTYPE HTML>
<html>
<head>
<title>lab4</title>
<link rel="shortcut icon" href="logo.png" type="image/png">
<meta charset="utf-8">
<style type="text/css">
td{
	height: 20px;
}
.form{
	width: 200px;
	outline: 1px solid;
	outline-offset: 5px;
	margin: 6px;
}
</style>
</head>
<body>

<?php 
$connection = mysqli_connect('127.0.0.1','root','','forms');
if($connection==false){
	echo "CONNECTION ERROR";
	exit();
}
?>


<br>

<form action="index.php" class="form">
	<b>1 table</b><br>
	Enter rows amount:<input type="number" name="rows_fst" required><br>
	Enter table width:<input type="number" name="width_fst" required><br>(standart: rows=6; width=500)<input type="submit" value="Submit">
</form>

<br>
<?php
$n=6; $w=500;
$counter=0;

if($_GET['rows_fst'] > 0 and $_GET['width_fst'] > 0 and $_GET['width_fst'] < 3000 and $_GET['rows_fst'] < 1000 ){
	$n=$_GET['rows_fst'];
	$w=$_GET['width_fst'];
	mysqli_query($connection, "INSERT INTO `correct` (`№table`, `rows`,`colloms`, `width`) VALUES (\"first\", \"". $n . "\", \"" . $n ."\", \"" . $w."\");");
}
elseif($_GET['rows_fst'] != 0){
	echo "<b>something went wrong</b><br><br>";
	mysqli_query($connection, "INSERT INTO `uncorrect` (`№table`, `rows`,`colloms`, `width`) VALUES (\"first\", \"". $_GET['rows_fst'] . "\", \"" . $_GET['rows_fst'] ."\", \"" . $_GET['width_fst'] ."\");");
}

if($n==6 and $w==500)
	echo "Table 1: standart";
else
	echo "Table 1: rows=" . $n . "; width=" . $w;

echo "<table border=\"1px\" width=\"" . $w . "px\" >";
for($i=0; $i<$n; $i++){
	echo "<tr>";
	if ($i > 0){
		echo "<td rowspan=" .($n-$i). "\" width=\"".  floor($w/$n) ."\">";
		$counter++;
		if($counter%4 == 0)
			echo "4th cell";
		echo "</td>";
	}

	echo "<td colspan=\"" .($n-$i). "\" width=\"".  floor($w/$n) ."\">";
	$counter++;
	if($counter%4 == 0)
		echo "4th cell";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
?>
</table>

<br><br>
<form action="index.php" class="form">
	<b>2 table</b><br>
	Enter rows amount:<br>
	<input type="number" name="rows_sec" required></input><br>
	Enter table width:<br>
	<input type="number" name="width_sec" required></input><br>(standart: rows=8; width=500)<br>
	<input type="submit" value="Submit" required></input>
</form>
<br>

<?php

$n=8;$w=500;
$counter=0;
if($_GET['rows_sec'] > 0 and $_GET['width_sec'] > 0 and $_GET['width_sec'] < 3000 and $_GET['rows_sec'] < 1000 ){
	$n=$_GET['rows_sec'];
	$w=$_GET['width_sec'];
	mysqli_query($connection, "INSERT INTO `correct` (`№table`, `rows`,`colloms`, `width`) VALUES (\"second\", \"". $n . "\", \"" . $n ."\", \"" . $w."\");");
}
elseif($_GET['rows_sec'] != 0){
	echo "<b>something went wrong</b><br><br>";
	mysqli_query($connection, "INSERT INTO `uncorrect` (`№table`, `rows`,`colloms`, `width`) VALUES (\"second\", \"". $_GET['rows_sec'] . "\", \"" . $_GET['rows_sec'] ."\", \"" . $_GET['width_sec'] ."\");");
}

if($n==8 and $w==500)
	echo "Table 2: standart";
else
	echo "Table 2: rows=" . $n . "; width=" . $w;

echo "<table border=\"1px\" width=\"" . $w . "px\">";


$check = false;
for($i=1; $i<$n+1; $i++){
	if($counter%8 == 0 and $counter != 0){
		echo "<tr>"."<td colspan=\"" .($n-$i). "\">"."</td>"."</tr>";
		$counter++;
		$check = true;
	}
	else{
		echo "<tr>";

		echo "<td rowspan=\"" .($n-$i+1).  "\" width=\"".  floor($w/$n) ."\">";
		$counter++;
		if($counter%4 == 0)
			echo "4th cell";
		echo "</td>";

		if ($i < $n){
			echo "<td colspan=\"";
			if($check == true or $n < 6){
				echo ($n-$i);
			}
			else{
				echo ($n-$i-1);
			}
			echo "\">";
			$counter++;
			if($counter%4 == 0)
				echo "4th cell";
			
			
			echo "</td>";
		}

		echo "</tr>";
	}
}
echo "</table>";
?>

<br><br>
<form action="index.php" class="form">
	<b>3 table</b><br>
	Enter rows amount:<br>
	<input type="number" name="rows_trd" required></input><br>
	Enter colloms amount:<br>
	<input type="number" name="col_trd" required></input><br>
	Enter table width:<br>
	<input type="number" name="width_trd" required></input><br>(standart: rows=6; colloms=4; width=500)<br>
	<input type="submit" value="Submit" required></input>
</form>
<br>

<?php
$n=6; $m=4; $w=500;
$counter=0;
if($_GET['rows_trd']>0 and $_GET['col_trd']>0 and $_GET['width_trd']>0 and $_GET['width_trd'] < 3000 and $_GET['col_trd'] < 500 and $_GET['rows_trd'] < 1000){
	$n=$_GET['rows_trd'];
	$m=$_GET['col_trd'];
	$w=$_GET['width_trd'];
	mysqli_query($connection, "INSERT INTO `correct` (`№table`, `rows`,`colloms`, `width`) VALUES (\"third\", \"". $n . "\", \"" . $m ."\", \"" . $w."\");");
	
}
elseif($_GET['rows_trd'] != 0){
	echo "<b>something went wrong</b><br><br>";
	mysqli_query($connection, "INSERT INTO `uncorrect` (`№table`, `rows`,`colloms`, `width`) VALUES (\"third\", \"". $_GET['rows_trd'] . "\", \"" . $_GET['col_trd'] ."\", \"" . $_GET['width_trd']."\");");
}
if($n==6 and $m==4 and $w==500)
	echo "Table 3: standart";
else
	echo "Table 3: rows=" . $n . "; colloms=". $m . "; width=" . $w;

echo "<table border=\"1px\" width=\"" . $w . "px\" style=\"table-layout: fixed;\">";
for($i=0; $i<$n; $i++){
	echo "<tr>";
	for($j=0; $j<$m; $j++){

		if(($i%2==0 and $j < ($m-1)) or ($i%2!=0 and $j > 0)) {
			echo "<td colspan=\"2\">";
			$counter++;
			if($counter%4 == 0)
				echo "4th cell";
			echo "</td>";
		}
		else{
			echo "<td width=\"" . floor($w/($m*2-1)) ."px\">";
			$counter++;
			if($counter%4 == 0)
				echo "4th cell";
			echo "</td>";
		}
	}
	echo "</tr>";
}
echo "</table>";
?>

<br><br>
<form action="index.php" class="form">
	<b>4 table</b><br>
	Enter rows amount:<br>
	<input type="number" name="rows_fth" required></input><br>
	Enter colloms amount:<br>
	<input type="number" name="col_fth" required></input><br>
	Enter table width:<br>
	<input type="number" name="width_fth" required></input><br>(standart: rows=7; colloms=8; width=500)<br>
	<input type="submit" value="Submit" required></input>
</form>
<br>

<?php
$n=7; $m=8; $w=500;
$counter=0;
if($_GET['rows_fth']>0 and $_GET['col_fth']>0 and $_GET['width_fth']>0 and $_GET['width_fth'] < 3000 and $_GET['col_fth'] < 500 and $_GET['rows_fth'] < 1000){
	$n=$_GET['rows_fth'];
	$m=$_GET['col_fth'];
	$w=$_GET['width_fth'];
	mysqli_query($connection, "INSERT INTO `correct` (`№table`, `rows`,`colloms`, `width`) VALUES (\"forth\", \"". $n . "\", \"" . $m ."\", \"" . $w."\");");

}
elseif($_GET['rows_sec'] != 0){
	echo "<b>something went wrong</b><br><br>";
	mysqli_query($connection, "INSERT INTO `uncorrect` (`№table`, `rows`,`colloms`, `width`) VALUES (\"forth\", \"". $_GET['rows_fth'] . "\", \"" . $_GET['col_fth'] ."\", \"" . $_GET['width_fth']."\");");	
}
if($n==7 and $m==8 and $w==500)
	echo "Table 4: standart";
else
	echo "Table 4: rows=" . $n . "; colloms=". $m . "; width=" . $w;

echo "<table border=\"1px\" width=\"" . $w . "px\"  height=\"" . $n*20 . "px\" style=\"table-layout: fixed;\">";
$merge=3;
for($i=0; $i<$n; $i++){

	echo "<tr>";

		if($i==0){
			for($j=0; $j<$m; $j++, $merge++){
				echo "<td rowspan=\"". $merge . "\" height=\"" . $merge*20 . "px\">";
				$counter++;
				if($counter%4 == 0)
					echo "4th cell";
				echo "</td>";
				if($merge==3)
					$merge=0;
			}
		}
		else{

			if($i%3 == 0)
				$size=floor(($m+2)/3);
			elseif(($i+1)%3 != 0)
				$size=floor(($m+1)/3);
			else
				$size=floor($m/3);

			if($i<($n-2))
				$merge=3;
			elseif($i==($n-2))
				$merge=2;
			else
				$merge=1;

			for($j=0; $j<$size; $j++){
				echo "<td rowspan=\"" . $merge . "\" height=\"" . 20*$merge . "px\">";
				$counter++;
				if($counter%4 == 0)
					echo "4th cell";
				echo "</td>";
			}
		}

	echo "</tr>";
}
echo "</table>";
?>

<br><br>

</body>
</html>