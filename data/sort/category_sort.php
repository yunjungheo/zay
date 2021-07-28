  <?php 

    $tabIdx = $_GET['key']; //1. get으로 키를 받아와야함.
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    //2. if문에 기존 $sql(전체로 설정되어있는.) 넣어주기.
    if($tabIdx == "all" || $tabIdx =="new"){
      $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_idx DESC";
    }else if($tabIdx =="price"){
      $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_pri ASC";
    }else if($tabIdx =="like"){
      $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_like DESC";
    }else{
      //3. else로 카테고리별로 선택하면 나올수있게 해줌.
       $sql1 = "SELECT * FROM zay_pro WHERE ZAY_pro_cate = '{$tabIdx}' ORDER BY ZAY_pro_idx DESC";
    }
     
    
    //가격에 천단위 표시해주기 
    // $price = $pro_row_pri;
    // echo  'number_format($price) : '.number_format($price).'<br>';

    $pro_result = mysqli_query($dbConn, $sql1);

    while($pro_row = mysqli_fetch_array($pro_result)){
      $pro_row_idx = $pro_row['ZAY_pro_idx'];
      $pro_row_img = $pro_row['ZAY_pro_img_01'];
      $pro_row_tit = $pro_row['ZAY_pro_name'];
      $pro_row_desc = $pro_row['ZAY_pro_desc'];
      $pro_row_pri = $pro_row['ZAY_pro_pri'];

      
      //좋아요 싫어요 기능 구현(반복 기능 추가)
      $like_unlike_type = -1;

      $status_query = "SELECT COUNT(*) AS cntStatus, ZAY_like_unlike_type FROM zay_like_unlike WHERE ZAY_like_unlike_userid ='{$useridx}' AND
      ZAY_like_unlike_postid ='{$pro_row_idx}'";

      $status_result = mysqli_query($dbConn, $status_query);
      $status_row = mysqli_fetch_array($status_result);
      $count_status = $status_row['cntStatus'];

      if($count_status > 0){
        $like_unlike_type = $status_row['ZAY_like_unlike_type'];
      }
      //echo $like_unlike_type;

      $like_query = "SELECT COUNT(*) cntLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid ='{$pro_row_idx}'";
      $like_result = mysqli_query($dbConn, $like_query);
      $like_row = mysqli_fetch_array($like_result);
      $total_likes = $like_row['cntLikes'];
      

      $unlike_query = "SELECT COUNT(*) cntUnLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid ='{$pro_row_idx}'";
      $unlike_result = mysqli_query($dbConn, $unlike_query);
      $unlike_row = mysqli_fetch_array($unlike_result);
      $total_unlikes = $unlike_row['cntUnLikes'];
  ?>
  <!-- Featured Loop Item -->
  <div class="featured_item">
  <div class="item_frame">
    <a href="/zay/pages/details/pro_detail_form.php?pro_idx=<?=$pro_row_idx?>">
      <div class="featured_img">
        <img src="/zay/data/product_imgs/<?=$pro_row_img?>" alt="">
      </div>
    </a>
    <div class="like_unlike">
      <div class="like_icons">
        <?php if(!$userid){  ?>
        <span onclick="plzLogin()">like | <b><?=$total_likes?></b></span>
        <span onclick="plzLogin()">unlike | <b><?=$total_unlikes?></b></span>
        <?php  } else {  ?>

        <span id="like_<?=$pro_row_idx?>" class="like" style="<?php if($like_unlike_type == 1){ echo"background:#59ab6e; color:#fff;"; } ?>">like | 
        <b id="likes_<?=$pro_row_idx?>"><?=$total_likes?></b>
        </span>
        <span id="unlike_<?=$pro_row_idx?>" class="unlike" style="<?php if($like_unlike_type == 0){ echo"background:lightcoral; color:#fff;"; } ?>">unlike | 
          <b id="unlikes_<?=$pro_row_idx?>"><?=$total_unlikes?></b>
        </span>

        <?php  }  ?>
        </div>

      <p><i class="fa fa-krw"></i><?=$pro_row_pri?></p>
    </div>
    <div class="featured_txt">
      <h3><?=$pro_row_tit?></h3>
      <p class="desc"><?=$pro_row_desc?></p>
    </div>
    
    <div class="reviews">
      <em>Comments(2)</em>
    </div>
  </div>
  </div>
  <!-- End of Featured Loop Item -->
  <?php } ?>
