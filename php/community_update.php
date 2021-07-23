<?php

  session_start();
  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  } else {
    $userid = "";
  }
  
  $detail_idx = $_GET['detail_idx'];
  $detail_writer = $_GET['detail_writer'];
  $write_input = $_POST['write_input'];
  $write_con = addslashes($_POST['write_con']);

  if(!$userid || $userid != $detail_writer){
    echo"
      <script>
        alert('잘못된 접근입니다.');
        location.href='/zay/index.php';
      </script>
    ";
  } else {
    
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "UPDATE zay_comm SET ZAY_comm_tit='{$write_input}', ZAY_comm_con='{$write_con}' WHERE ZAY_comm_idx=$detail_idx";

    mysqli_query($dbConn, $sql);

    echo "
    <script>
    alert('수정이 완료되었습니다.');
    history.go(-1);
    </script>
    ";
  }
?>