<?php
	session_start(); //啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
	$acc = $_POST["Acc"];
	$val = $_POST["keyValue"]; //密碼
	
	if ($acc == "acc" && $val == "123"){
		$_SESSION["Acc"] = $acc;
		$_SESSION["keyValue"] = $val; //宣告session 變數並指定值
		setcookie("keyValue", $val, time()+36000); // 設定cookie值與有效時間
		header("Location: 1.listUI.php");
	}
	else {
		unset($_SESSION["Acc"]);
		unset($_SESSION["keyValue"]);
	}
?>
<!-- ok!! -->
<!-- <a href="session-get.php">get session value</a> -->