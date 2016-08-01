<?php
require_once('config.inc');

$id = $_GET['id'];
if( !$id && $id != '0' ){
  header("Location: list.php");
  exit;
}

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
  <h1>投票</h1>
  <table class="pure-table">
    <thead><tr>
      <th>名称</th><th>说明</th><th>当前票数</th><th></th>
    </tr></thead>
    <tbody>
<?php

// 连接数据库
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$sql = "select * from t_vote_item where vote_id='" . $id . "' order by `order`";
//echo $sql;
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)){
  echo "<tr>";
  echo "<td>" . $result["option"] . "</td>";
  echo "<td>" . $result["op_desc"] . "</td>";
  echo "<td>" . $result["count"] . "</td>";
  echo "<td> <a href='do_vote.php?vote_id=" . $id . "&op_id=" . $result["id"] . "' >Vote</a> </td>";
  echo "</tr>";
}

mysqli_close($connect);

?>

</tbody></table>
</div>
</body>
</html>
