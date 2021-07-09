$(function(){
  // 1.top bar 높이 확인하기
  // const tbHeight = $(".top_bar").outerHeight();
  // height 함수는 패딩 사이즈를 못읽어줌 
  // 그래서 outerHeight 를 사용해줌
  //2. header의 맨 끝 위에 범위 알아보기
    // console.log(hdTop);
    // console.log(tbHeight);


 //header stick to top and change style when scrolling down
  const headerStick = function(){
    const hdTop = $("header").offset().top;
      

      $(window).scroll(function(){
        const scroll = $(window).scrollTop();
        //스크롤이 내려가면서 탑값이 게속 변해야하기때문에 이안에 적어줌
        //console.log(scroll);
        if(scroll >=hdTop){
          $("header").css({
            position:"fixed",
            top:0,
            width:"100%"
          });
          $("header").addClass("stick");
        }else{
          $("header").css({position:"static"});
          $("header").removeClass("stick");
        }
      });
  }

  headerStick();
  //식별자인데 함수역할을 하고 밑에서 호출을 해준다 : 

  //Light Slider Function Code
  $(".slider").lightSlider({
     //1.슬라이드 할부분의 전체를 감싸고있는 slider를 선택해준것
     //2.lightSlider안에 객체화 시켜서 넣어줘야해서 {}사용
  
    item: 1,
    controls: true,
    prevHtml: '<i class="fa fa-angle-left"></i>',
    nextHtml: '<i class="fa fa-angle-right"></i>',
  
  }); 
 
    
});