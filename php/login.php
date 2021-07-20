<?php

//로그인 순서
// 1. 아이디 조회 
// 2. 조회된 아이디 판별(if 조건문)
// 3. 아이디가 존재하면 비밀번호 판별
// 4. 비밀번호가 일치하면 세션 정보 저장
// 5. 메인 페이지로 이동

$login_id = $_POST['login_id'];
$login_pass = $_POST['login_pass'];

//echo $login_id, $login_pass;

include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
//$sql = "SELECT * FROM zay_mem WHERE ZAY_mem_id=".$login_id;
$sql = "SELECT * FROM zay_mem WHERE ZAY_mem_id='{$login_id}'";

$login_result = mysqli_query($dbConn, $sql);

// 1. 아이디 조회 및 존재 여부 파악
$id_match = mysqli_num_rows($login_result);

//var_dump($id_match);

if(!$id_match){
  echo "
    <script>
      alert('등록되지 않은 아이디 입니다.');
      location.href='/zay/pages/join_form.php';
    </script>
  ";
} else {
  //테이블 데이터 값을 배열로 저장
  $login_row = mysqli_fetch_array($login_result);
  //비밀번호 문자열 추출하여 저장
  $db_pass = $login_row['ZAY_mem_pass'];
  //추출된 문자열과 입력된 비민번호 문자열 비교
  if($login_pass != $db_pass){
    echo "
    <script>
      alert('비밀번호가 틀립니다.');
      history.go(-1);
    </script>
  ";
  } else {
    // session_start 함수는, 첫째 호출 이후의 데이터를 서버에 저장한다는 의미와, 둘째 이미 저장된 세션을 불러들이는 기능을 가진다
    session_start();
    $_SESSION['userid'] = $login_row['ZAY_mem_id'];
    $_SESSION['userprofile'] = $login_row['ZAY_mem_pf'];
    $_SESSION['useridx'] = $login_row['ZAY_mem_idx'];

    echo "
      <script>
        location.href='/zay/index.php';
      </script>
    ";
  }
}

?>