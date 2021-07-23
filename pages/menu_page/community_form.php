<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1" />
  <title>Zay Shop || Community</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">
</head>
<body>

  <?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php"; ?>

  <section class="community">
    <div class="center">
      <div class="tit_box">
        <h2>Community Board</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br> mollit anim id est laborum.</p>
      </div>

      <div class="comm_table comm_center">
        <ul class="comm_row">
       <!-- ajax elements load here... -->
        </ul>
      </div>
      <!-- End of comm_table -->
      <div class="search_paging comm_center">
        <div class="search">
          <form action="#" class="search_form" name="search_form">
            <select name="" id="">
              <option value="">아이디</option>
              <option value="">제목</option>
            </select>
            <input type="text" placeholder="검색어를 입력해 주세요.">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>

        <div class="paging">
          <span class="angle-double first"><i class="fa fa-angle-double-left"></i></span>
          <span class="prev angle"><i class="fa fa-angle-left"></i></span>

          <?php
            include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
            $sql_paging = "SELECT * FROM zay_comm";

            $pasing_result = mysqli_query($dbConn, $sql_paging);
            $total_record = mysqli_num_rows($pasing_result);
            $paging_num = 5;

            if($total_record % $paging_num == 0){
              $total_page = floor($total_record / $paging_num);
                //floor 소수점 없애주는 함수
            }else{
              $total_page = floor($total_record / $paging_num) + 1;
              
            }

            for($i = 1; $i <= $total_page; $i++){
          ?>
          <span class="num" onClick="getPage(<?=$i?>)"><?=$i?></span>
            <?php } ?>

          <span class="next angle"><i class="fa fa-angle-right"></i></span>
          <span class="angle-double last"><i class="fa fa-angle-double-right"></i></span>
        </div>
      </div>
      <!-- End of search paging -->

      <div class="write comm_center">
        <h4>글을 입력해 주세요.</h4>
        <form class="write_form" action="/zay/php/community_insert.php" name="write_form" method="post">
          <div class="write_tit">
            <label for="write_input">제목</label>
            <input type="text" id="write_input" placeholder="제목을 입력해 주세요." name="write_input">
          </div>
          <div class="write_con">
            <textarea placeholder="내용을 입력해 주세요." name="write_con"></textarea>
          </div>
        </form>
     
        <div class="write_btn">
          <?php if(!$userid){  ?>
          <button type="button" onclick="plzLogin()">글쓰기</button>
          <?php } else { ?>
          <button type="button" onclick="sendWrite()">글쓰기</button>
          <?php } ?>
        </div>
      </div>
      <!-- End of write comm_center -->
    </div>
  </section>















  
  <?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php"; ?>


   <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.comm_ajax.js"></script>
  <script>
    function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false;
    }

    function sendWrite(){
      if(!document.write_form.write_input.value){
        alert('제목을 입력해 주세요.');
        return;
      }
      if(!document.write_form.write_con.value){
        alert('내용을 입력해 주세요.');
        return;
      }
      document.write_form.submit();
    }

  </script>
</body>
</html>






