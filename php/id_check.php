<?php

$id_val = $_GET['id_val'];

//echo $id_val;


if(!$id_val){//아이디를 입력하지 않았다면 메시지 전달

  echo "아이디를 입력해 주세요.";
} else {//아이디를 입력해다면 입력 문자가 테이블에 있는지 판별
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";

  $sql = "SELECT * FROM zay_mem WHERE ZAY_mem_id='{$id_val}'";

  $result = mysqli_query($dbConn, $sql);
  $id_record = mysqli_num_rows($result);
  //아이디 중복체크시 없으면 0 있으면 1이 나옴

  if($id_record){
    echo $id_val."은(는) 존재하는 아이디 입니다.\n다른 아이디를 사용해주세요.";

  }else{
    echo $id_val."은(는) 사용할 수 있는 아이디 입니다.";
  }
} 

?>