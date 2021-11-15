<!-- 檢查帳密 -->
<!-- 須重看密碼加密 -->
<?php
require("dbconfig.php");
//啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
$loginID = $_POST["id"];
$password = $_POST["pwd"];

$sql = "select loginID, role, level from User where password=PASSWORD(?);";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $password); //bind parameters with variables
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($rs = mysqli_fetch_assoc($result)) {
	if ($rs['loginID'] == $loginID) {
   		$_SESSION['userID'] = $loginID; //宣告session 變數並指定值
		$_SESSION['role'] = $rs['role'];
		$_SESSION['level'] = $rs['level'];
   		header("Location: 0.home.php");
	} else {
   		$_SESSION['userID'] = '';
		$_SESSION['role'] = '';
		$_SESSION['level'] = '';
   		header("Location: 0.loginUI.php");
	}
}
?>