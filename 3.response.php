<?php
require('dbconfig.php');

$mid=(int)$_POST['mid'];
$msg=$_POST['msg'];
$author=$_POST['author'];
$type = $_POST['type'];

if ($mid > 0) {
	$sql = "insert into `response` (mid, msg, author) values (?, ?, ?)";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "iss", $mid, $msg, $author); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
	$sql = "update guestbook set `response`=response+1 where id=?;";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $mid); //bind parameters with variables
	mysqli_stmt_execute($stmt);
	header("Location: 3.viewPost.php?id=$mid&type=$type");
} else {
	echo "empty title, cannot insert.";
}
?>