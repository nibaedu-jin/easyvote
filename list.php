<?php
require_once('config.inc');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Score List</title>
  <style media="screen">
  </style>
  <script type="text/javascript">
  </script>

</head>
<body>
  <table>
<?php

// 连接数据库
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$sql = "select * from t_vote";
//echo $sql;
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)){
  echo "<tr>";
  echo "<td>" . $result["id"] . "</td>";
  echo "<td>" . $result["name"] . "</td>";
  echo "<td>" . $result["desc"] . "</td>";
  echo "<td> <a href='vote.php?id=" . $result["id"] . "' >Vote</a> </td>";
  echo "</tr>";
}

mysqli_close($connect);

?>

</table>
</body>
</html>
