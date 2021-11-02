<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic HTML Examples</title>
</head>
<body>
<p>This is a Pargraph</p>
<hr>
<?php
	//using date function
	$weekday = date('w');
	if ($weekday == 0 or $weekday == 6) {
		echo "It is on the weekend.: $weekday";
	} else {
		echo "It is a weekday. $weekday";
	}
?>
<!-- This is a note or comment -->
<!-- Use PHP to generate HTML Table Rows -->
<p>表格</p>
<table width="200" border="1">
  <tr>
    <td>#</td>
    <td>sales</td>
    <td>total</td>
  </tr>
<?php
	$tot=0;
	for ($i=0;$i<5;$i++) {
		$x=rand(1000,3000); //generate an integer random number within the range: 1000-3000 	
		$tot += $x;
		
		//echo a table row
		echo "<tr><td>$i</td>";
		echo "<td>$x</td>";
		echo "<td>$tot</td>";
		echo "</tr>";
	}
?>
</table>
<hr>

<!-- form -->
<p>表單</p>
換行<br>
<form method="post" action="test.php" target="_blank">
field title: <input type="text" name="txt" value="<?php echo 9999;?>"> <br>
title: <textarea name="note">
<?php echo $tot;?>
hello
This is text area
</textarea> <br>
<!-- Use PHP to generate select options -->
<select name="sel">
<?php
	$i=0;
	while ($i<5) {
?>
	<option value="<?php echo $i;?>">數字: <?=$i?></option>
<?php
		$i++;
	}
?>
</select> <br>
<input type="submit">
</form>
<hr>

<p>超連結</p>
<!-- hyper link -->
<a href="000.php">simple link</a> <br>
<a href="000.php?a=<?php echo $tot;?>&b=okok">link with parameter</a> <br>
<a href="000.php" target="_blank">link with a target window</a><br>
</body>
</html>
