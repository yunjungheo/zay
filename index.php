<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1" />
  <title>Zay Shop</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Light Slider Plugin Link -->
  <link rel="stylesheet" href="/zay/lib/lightslider.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">
</head>
<body>

  <div class="wrap">

    <?php 
      include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php"; 
      include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
      
      
      ?>

    <!-- Slider Landing Section -->
    <section class="slider">
      <!-- Loop Slider Box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Zay eCommerce</h2>
            <h4>Tiny and Perfect eCommerce Template</h4>
            <p>Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).<br>This template is 100% free provided by TemplateMo website.<br>Image credits go to Freepik Stories, Unsplash and Icons 8.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_01.jpg" alt="">
          </div>
        </div>
      </div>
      <!-- End of Loop Slider Box -->
      <!-- Loop Slider Box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Zay eCommerce</h2>
            <h4>Tiny and Perfect eCommerce Template</h4>
            <p>Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).<br>This template is 100% free provided by TemplateMo website.<br>Image credits go to Freepik Stories, Unsplash and Icons 8.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_02.jpg" alt="">
          </div>
        </div>
      </div>
      <!-- End of Loop Slider Box -->
      <!-- Loop Slider Box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Zay eCommerce</h2>
            <h4>Tiny and Perfect eCommerce Template</h4>
            <p>Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).<br>This template is 100% free provided by TemplateMo website.<br>Image credits go to Freepik Stories, Unsplash and Icons 8.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_03.jpg" alt="">
          </div>
        </div>
      </div>
      <!-- End of Loop Slider Box -->
    </section>
    <!-- End of Slider Landing Section -->

    <!-- Categories Section -->
    <section class="categories">
      <div class="center">
        <div class="tit_box">
          <h2>Categories of The Month</h2>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br> mollit anim id est laborum.</p>
        </div>
        <div class="cate_box">
          <?php
          //상품 카테고리 분류 배열
            $cate_arr = array('watches','shoes', 'accessories');

            for($i = 0; $i < count($cate_arr); $i++){
              $sql = "SELECT * FROM zay_pro WHERE ZAY_pro_cate='{$cate_arr[$i]}' ORDER BY ZAY_pro_idx DESC LIMIT 1";
            $cate_result = mysqli_query($dbConn, $sql);
            $cate_result_row = mysqli_fetch_array($cate_result);
            
            $cate_img = $cate_result_row['ZAY_pro_img_01'];
            $cate_tit = $cate_result_row['ZAY_pro_cate'];
          ?>  
          <!-- Loop of Cate Item -->
          <div class="cate_item">
            <div class="cate_img">
              <img src="/zay/data/product_imgs/<?=$cate_img?>" alt="">
            </div>       
            <h3><?=$cate_tit?></h3>
            <a href="#" class="main_btn">Go Shop</a>
          </div>
          <!-- End of Loop of Cate Item -->
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- End of Categories Section -->
    <!--Featired Product Section -->         
    <section class="featured">
     <div class="center">
      <div class="tit_box">
        <h2>Featured Product</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br> mollit anim id est laborum.</p>
      </div>
      <div class="featured_box">

        <?php 
          $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_idx DESC";
          $pro_result = mysqli_query($dbConn, $sql1);

          while($pro_row = mysqli_fetch_array($pro_result)){
            $pro_row_idx = $pro_row['ZAY_pro_idx'];
            $pro_row_img = $pro_row['ZAY_pro_img_01'];
            $pro_row_tit = $pro_row['ZAY_pro_name'];
            $pro_row_desc = $pro_row['ZAY_pro_desc'];
            $pro_row_pri = $pro_row['ZAY_pro_pri'];

            //좋아요 싫어요 기능 구현(반복 기능 추가)
            $like_unlike_type = -1;

            // $status_query = "SELECT COUNT(*) AS cntStatus, ZAY_like_unlike_type FROM zay_like_unlike WHERE ZAY_like_unlike_userid ='{$useridx}' AND
            // ZAY_like_unlike_postid ='{$pro_row_idx}'";

            $status_query = "SELECT * FROM zay_like_unlike WHERE ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$pro_row_idx}'";

            $status_result = mysqli_query($dbConn, $status_query);
            $status_num = mysqli_num_rows($status_result);
            $status_row = mysqli_fetch_array($status_result);
            //$count_status = $status_row['cntStatus'];
            //echo $status_row;

            // $status_result = mysqli_query($dbConn, $status_query);
            // $status_row = mysqli_fetch_array($status_result);
            // $count_status = $status_row['cntStatus'];

            if($status_num > 0){
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
                  <!-- 로그인안할때 나오는. -->
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
            <?php
              $sql2 = "SELECT * FROM zay_review WHERE 	ZAY_pro_rev_con_idx=$pro_row_idx";
              $rev_num_sql = mysqli_query($dbConn, $sql2);
              $rev_total = mysqli_num_rows($rev_num_sql);
            ?>
            <div class="reviews">
              <em>Comments(<?=$rev_total?>)</em>
            </div>
          </div>
        </div>
        <!-- End of Featured Loop Item -->


        <?php } ?>

      </div>
     <div class="load_more">
       <button type="button">More</button>
     </div>
     </div>
    </section>

    <?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php"; ?>
    
  </div>

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/lib/lightslider.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.like.unlike.js"></script>
  <script src="/zay/js/slider.js"></script>
  
  <script>
    function plzLogin(){
     alert('로그인 후 이용해 주세요.');
     return false;
   }
  </script>
</body>
</html>