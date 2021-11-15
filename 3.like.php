<?php
require("dbconfig.php");
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	$id=0;
}
$t=(int)$_GET['t'];
$mid=(int)$_GET['mid'];
$type=(int)$_GET['type'];
if ($id>0) {
	if($t == 1){
		$sql = "update response set `likes`=likes+1 where id=?;";
	}elseif($t == -1){
		$sql = "update response set `likes`=likes-1 where id=?;";
	}else {
		exit;
	}
	
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	//echo "liked.";
	header("Location: 3.viewPost.php?id=$mid&type=$type");
} else {
	echo "empty id, cannot like.";
}
?>
