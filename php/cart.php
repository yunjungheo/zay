<?php

// $a = $_POST['cart_img'];
// $b = $_POST['cart_name'];
// $c = $_POST['cart_desc'];
// $d = $_POST['cart_pri'];

// echo $a." ".$b." ".$c." ".$d;


session_start();
//session_destroy(); 
//이걸적어주면 addtocart 눌렀을때 배열이 나오고 두번째눌렀을떼 세션있음이라고나오는데 이걸해주면 계속 배열들을 볼수있음.
if($_SERVER["REQUEST_METHOD"]=="POST"){
  //포스트 방식으로 데이터가 넘어올 경우
 //서버방식이 뭔지 구분하는 
  if(isset($_POST['add_to_cart'])){
    //add_to_cart 네임 변수의 버튼을 눌러 넘어오면 
    if(isset($_SESSION['cart'])){
      // echo "세션 있음";
      $addedItem = array_column($_SESSION['cart'], 'cart_name');
      //array_column : 주어진 배열(첫번째 파라미터)에서 특정 컬럼(두번째 파라미터)값 반환 ex)https://zetawiki.com/wiki/PHP_array_column()

      if(in_array($_POST['cart_name'], $addedItem)){// 계속 추가되는 조건, $addedItem 이게 있으면 ...else에있는걸 보여주고,
        //'cart_name' 이있으면 ture가 됨 ..? in_array(a,b) : b배열에서 a요소가 있으면 true  $addedItem
        echo"
        <script>
        alert('이미 추가된 상품입니다.');
        history.go(-1);
        </script>
        ";

      }else{
        $count = count($_SESSION['cart']);
        //echo $count; 카운트 갯수를 샌거
        $_SESSION['cart'][$count]=array(
        'cart_idx' => $_POST['cart_idx'],
        'cart_img' => $_POST['cart_img'],
        'cart_name' => $_POST['cart_name'],
        'cart_desc' => $_POST['cart_desc'],
        'cart_pri' => $_POST['cart_pri'],
        'cart_quan' => 1
        
        );

        echo"
        <script>
        alert('카트에 상품이  추가되었습니다.');
        history.go(-1);
        </script>
        ";
      }
      //var_dump($_SESSION['cart']);
      var_dump($addedItem) ;


    } else {//세션 없을때 카트에 0번째로 만들어줌 //배열은 echo찍으면 array만 찍힘
      $_SESSION['cart'][0]=array(
        'cart_idx' => $_POST['cart_idx'],
        'cart_img' => $_POST['cart_img'],
        'cart_name' => $_POST['cart_name'],
        'cart_desc' => $_POST['cart_desc'],
        'cart_pri' => $_POST['cart_pri'],
        'cart_quan' => 1
      
      
      );
      //var_dump($_SESSION['cart']);
      echo"
      <script>
      alert('카트에 상품이  추가되었습니다.');
      history.go(-1);
      </script>
      ";

    }

  } //  post변수로 넘어온  add_to_cart name 의 check 끝부분


  //remove_cart 가 넘어오는지 체크
  if(isset($_POST['remove_cart'])){
    foreach($_SESSION['cart'] as $key => $value){
      if($value['cart_name'] == $_POST['cart_remove']){//추가된 카트 상품 정보중 상품이름이 cart_remove 버튼 클릭시 넘어오는 cart_remove의 post value와 같은 경우 
        unset($_SESSION['cart'][$key]); 
        //같을경우 세션의 모든 값을 지워줌 
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        echo"
        <script>
         alert('카트에서 상품이 삭제되었습니다.');
         history.go(-1);
        </script>
        
        ";
      }
    }
  }

}



?>