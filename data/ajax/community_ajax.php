<li class="comm_tit">
  <span>번호</span>
  <span>아이디</span>
  <span>제목</span>
  <span>등록일</span>
  <span>조회수</span>
</li>

<?php

    $page = $_GET["page"];

    if($page == ''){
      $page == 1;
      
    }

    $view_per_page = 5;
    //5개씩 보여주는거 
    $from = ($page -1) *  $view_per_page;
    //from 은 시작하는페이지 
    //1을가지고 5개씩 불러오는 알고리즘을 짜야함 (-1 빼주는건 고정값,  1개가 넘어오면 고정값 -1 이되고 0 이된다음에  곱하기 정해진페이지(5 곱해지면) 0 )이런식으로 돌아감 

    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "SELECT * FROM zay_comm ORDER BY ZAY_comm_idx DESC LIMIT $from, $view_per_page";
    
    $comm_result = mysqli_query($dbConn, $sql);
    while($comm_row = mysqli_fetch_array($comm_result)){
      $comm_idx = $comm_row['ZAY_comm_idx'];
      $comm_id = $comm_row['ZAY_comm_id'];
      $comm_tit = $comm_row['ZAY_comm_tit'];
      $comm_reg = $comm_row['ZAY_comm_reg'];
      $comm_hit = $comm_row['ZAY_comm_hit'];
    
?>

  <li class="comm_con">
    <span><?=$comm_idx?></span>
    <span><?=$comm_id?></span>
    <span><a href="/zay/pages/menu_page/community_details.php?detail_idx=<?=$comm_idx?>"><?=$comm_tit?></a></span>
    <span><?=$comm_reg?></span>
    <span><?=$comm_hit?></span>
  </li>
<?php  } ?>