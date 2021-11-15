<!-- 檢查帳密 -->
<!-- 須重看密碼加密 -->
<?php
require("dbconfig.php");

echo "<p>hello " .$_SESSION['userID']. "</p>";
echo "<p><a href='0.loginUI.php'> Log Out </a></p><hr />";
echo "<a href='1.listUI.php?type=1'>閒聊</a><br />
		<a href='1.listUI.php?type=2'>心情</a><br />
		<a href='1.listUI.php?type=3'>八卦</a><br />";
?>