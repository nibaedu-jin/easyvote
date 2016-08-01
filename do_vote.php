<?php
require_once('config.inc');

$vote_id = $_GET['vote_id'];
$op_id = $_GET['op_id'];

// 连接数据库
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if(!$connect){
  die('数据库连接失败，错误信息：'.mysqli_connect_error());
}
$sql = "update t_vote_item set count=count+1 "
      ."where vote_id='" . $vote_id . "' and id=" . $op_id;
//echo $sql;
$query = mysqli_query($connect, $sql);

mysqli_close($connect);

header("Location: vote.php?id=" . $vote_id );
?>
