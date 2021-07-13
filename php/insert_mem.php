<?php

  $mem_id = $_POST['mem_id'];
  $mem_pass = $_POST['mem_pass'];
  $mem_name = $_POST['mem_name'];
  $mem_email = $_POST['mem_email'];
  $mem_regi = date('Y-m-d');

  //파일 변수가 전달 되면 각 파일의 정보가 함께 전달된다. 그 정보에는 파일의 이름, 임시이름, 에러 정보 등이 있다.
  $mem_pf_name = $_FILES['mem_pf']['name'];
  $mem_pf_tmp = $_FILES['mem_pf']['tmp_name'];
  $mem_pf_err = $_FILES['mem_pf']['error'];

  //사진 업로드 파일 경로
  $pf_upload_dir = $_SERVER["DOCUMENT_ROOT"]."/zay/data/profile/";

  //사진 업로드
  if($mem_pf_name && !$mem_pf_err){
    $uploaded_url = $pf_upload_dir.$mem_pf_name;
    if(!move_uploaded_file($mem_pf_tmp, $uploaded_url)){
      die("파일을 지정한 디렉토리에 업로드를 실패했습니다.");
    }
  } else {
    $mem_pf_name = "";
  }

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql = "INSERT INTO zay_mem (
    ZAY_mem_id,
    ZAY_mem_pass,
    ZAY_mem_pf,
    ZAY_mem_name,
    ZAY_mem_email,
    ZAY_mem_regi_day
  ) VALUES(
    '{$mem_id}',
    '{$mem_pass}',
    '{$mem_pf_name}',
    '{$mem_name}',
    '{$mem_email}',
    '{$mem_regi}'
  )";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('회원가입이 완료되었습니다.');
      location.href='/zay/index.php';
    </script>
  ";

  //echo $mem_id, $mem_pass, $mem_pf, $mem_name, $mem_email;

?>