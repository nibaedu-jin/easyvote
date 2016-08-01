<?php
require_once('config.inc');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Score List</title>
  <link rel="stylesheet" href="static/pure-min.css" media="screen" title="no title" charset="utf-8">
  <style media="screen">
  </style>
  <script type="text/javascript">
  </script>

</head>
<body>
  <div style="padding: 2em;" class="post">
  <h1>投票一览</h1>
  <table class="pure-table">
    <thead><tr>
      <th>编号</th><th>名称</th><th>说明</th><th>投票链接</th>
    </tr></thead>
    <tbody>
<?php

// 连接数据库
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$sql = "select * from t_vote order by id desc";
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

</tbody></table>
</div>
</body>
</html>
