<?php

  session_start();
  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  } else {
    $userid = "";
  }
  
  $reply_id = $_GET['reply_id'];


  if(!$userid || $userid != $reply_id){
    echo"
      <script>
        alert('잘못된 접근입니다.');
        location.href='/zay/index.php';
      </script>
    ";
  } else {
    $del_key = $_GET['del_key'];
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "DELETE FROM zay_reply WHERE ZAY_reply_idx=$del_key";

    mysqli_query($dbConn, $sql);

    echo "
    <script>
    alert('삭제가 완료되었습니다.');
    history.go(-1);
    </script>
    ";
  }
?>