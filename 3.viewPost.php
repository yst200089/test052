<?php
require("dbconfig.php");
if (!(checkAccessRole('user') or checkAccessRole('admin'))){ //檢查是否有登錄
	header("Location: 0.loginUI.php");
}
if(isset($_GET['id'])) {
	$id=(int)$_GET['id'];
} else {
	echo "invalid id";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
$type = (int)$_GET['type'];
echo "<a href='1.listUI.php?type=$type'>Back</a><br>";
?>
<table width="300" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
    <td>讚</td>
	<td>類別</td>
	<td>-</td>
  </tr>
<?php
$sql = "select * from guestbook where id=?;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$rs = mysqli_fetch_assoc($result);
$msg = $rs['msg'];
	echo "<tr><td>" , $rs['id'] ,
	"</td><td>", $rs['title'],
	"</td><td>";
	if ($rs['response'] <= 5) {
		echo "<font color='black'>$msg</font>";
	} else if ($rs['response']>5 && $rs['response'] <= 10) {
		echo "<font color='blue'>$msg</font>";
	} else {
		echo "<font color='red'>$msg</font>";
	}
	echo "</td><td>", $rs['name'], "</td>",
	"</td><td>", $rs['likes'], "</td>";
	if ($type == 1) {
		echo "</td><td>閒聊</td>";
	} else if ($type == 2) {
		echo "</td><td>心情</td>";
	} else if ($type == 3) {
		echo "</td><td>八卦</td>";
	}
	echo "<td><a href='2.like.php?id=", $rs['id'], "&t=1'>Like</a> ",
	"<a href='2.like.php?id=", $rs['id'], "&t=-1&type=$type'>Dislike</a> ",
	"<a href='2.delete.php?id=", $rs['id'], "'>Delete</a> ",
	"<a href='1.editUI.php?id=", $rs['id'], "'>Edit</a></td></tr>";
?>
</table>
<?php
//fetch responses of this post
$sql = "select * from `response` where mid=? order by id;";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
echo "<table><tr><td>留言</td><td>用戶</td><td>讚</td><td>-</td></tr>";
while ($rs = mysqli_fetch_assoc($result)) {
	echo "<tr><td>", $rs['msg'],
	"</td><td>", $rs['author'], "</td>",
	"</td><td>", $rs['likes'], "</td>",
	"<td><a href='3.like.php?id=", $rs['id'],"&mid=", $rs['mid'], "&t=1'>Like</a> ",
	"<a href='3.like.php?id=", $rs['id'],"&mid=", $rs['mid'], "&t=-1'>Dislike</a></td></tr>";
}
?>
<form method="post" action="3.response.php">
    <td><label>
      <input name="mid" type="hidden" value="<?php echo $id;?>" />
      <input name="msg" type="text" id="msg" />
	  <input name="author" type="hidden" value="<?php echo $_SESSION['userID'];?>" />
	  <input name="response" type="hidden" value="<?php echo 1;?>" />
	  <input name="type" type="hidden" value="<?php echo $type;?>" />
    </label></td>
    <td><label>
        <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
</body>
</html>