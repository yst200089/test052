<?php
require('dbconfig.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
</head>
<body>
<p>my guest book !! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>title</td>
    <td>message</td>
    <!-- <td>type</td> -->
  </tr>
  <form method="post" action="2.insert.php">
    <tr><td><label>
      <input name="title" type="text" id="title" />
    </label></td>
    <td><label>
      <input name="msg" type="text" id="msg" />
    </label></td>
    <td><label>
      <input name="myname" type="hidden" value="<?php echo $_SESSION['userID'];?>" />
    </label></td>
  </tr>
  <select name="type">
    <option value="1">閒聊</option>
    <option value="2">心情</option>
    <option value="3">八卦</option>
  </select>
  <input type="submit" name="Submit" value="送出" />
	</form>
</table>
</body>
</html>
