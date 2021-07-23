$(function(){
  const url = "/zay/data/ajax/community_ajax.php";

  $.get(url, {page : 1}, function(comm_data){
     //파라미터 세개가 들어가는데 마지막에들어가는건 콜백 첫번째는 url 주소, 두번째는 전달할 겟 데이터(우리가 정하는거)

     $(".comm_row").append(comm_data);

  });
 
});

let current = 1;
const pgLength = $(".num").length;
// 1. 넥스트를 누르면 페이지가 없어도 가상의 다음페이지로 넘어가있음 처리방법! ajax를 통해 클릭한 넘버링 데이터 불러옴  
function getPage(n){
  const url = "/zay/data/ajax/community_ajax.php";
  $(".num").removeClass("active");
  $(".num").eq(n - 1).addClass("active");
  //n은 1부터가는데 eq는 0부터 가서 버튼눌렀을때 3을 누르면 4로감 그래서 -1 써줌

  
  $.get(url, {page : n}, function(comm_data){
    $(".comm_row").html(comm_data);
    current = n;

 });
 

};

// 아래 함수를 간단하게 합치는 리팩토링...
function prevNext(pageNum, calcPage){
  if(current == pageNum){ 
    getPage(pageNum);
   }else{
    getPage(current + calcPage);
   }
}
//세번째 간단하게 만들어준거 span에 동일한 클래스명 지정해줘서 만드는법
$(".angle").click(function(){
  if($(this).hasClass("prev")){
    prevNext(1, -1);
  }else{
    prevNext(pgLength, 1);
  }
  
});
//맨처음으로 가기 맨끝으로 가기
$(".angle-double").click(function(){
  if($(this).hasClass("first")){
    getPage(1);
  }else{
    getPage(pgLength);
  }

});


$(".num").eq(0).addClass("active");
//처음에 1 번숫자에 색이 지정되게 하려고 써줌

//두번째 간단하게 만들어준거 
//  $(".prev").click(function(){
//    prevNext(1, -1)
  // if(current == 1){
  //  getPage(1);
  // }else{
  //  getPage(current - 1);
  // };
//  });
 
// $(".next").click(function(){
  
//   prevNext(pgLength, 1)
  // if(current == pgLength){ 
  //  getPage(pgLength);
  // }else{
  //  getPage(current + 1);
  // };
//  });


// 첫번째로 만든거 
// 넥스트를 누르면 페이지가 없어도 가상의 다음페이지로 넘어가는거 방지하는..
// $(".next").click(function(){
//  if(current == pgLength){ 
//   getPage(pgLength);
//  }else{
//   getPage(current + 1);
//  };
// });

// $(".prev").click(function(){
//  if(current == 1){
//   getPage(1);
//  }else{
//   getPage(current - 1);
//  };
// });


