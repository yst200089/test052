<?php
	//Session �ϥνd��
	session_start(); //�ҥ�session �\��, �����bphp�{���٨S��X����T�����e�ҥ�
	//$_SESSION["varName"] = "session ok"; //�ŧisession �ܼƨë��w��

	if ( isset($_SESSION["keyValue"])) {
		echo "Session['keyValue']=" . $_SESSION["keyValue"] . "<br>";
	} else {
		echo "Session['keyValue'] does not exist!<br>";
	}

	if ( isset($_COOKIE["keyValue"])) {
		echo "cookie['keyValue']=" . $_COOKIE["keyValue"] . "<br>";
	} else {
		echo "cookie['keyValue'] does not exist!<br>";
	}

/*
	$a = $_SESSION["keyValue"]; //���osession �ܼ� keyValue ����
	unset($_SESSION['�ܼƦW��']); //����session �ܼƪ��ŧi

	//cookie�ϥνd��
	setcookie("cookieName", "cookieValue", time()+36000); // �]�wcookie�ȻP���Įɶ�
	$b= $_COOKIE["cookieName"]; //���ocookie����
	echo $a, $b;

*/
?>
<hr>
<form method="post" action="session-set.php">
Input Key value <input type="text" name="key">
<input type="submit">
</form>