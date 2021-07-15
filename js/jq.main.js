$(function(){
  
  //header stick to top and change style when scrolling down
  const headerStick = function(){
    const hdTop = $("header").offset().top;

    $(window).scroll(function(){
      const scroll = $(window).scrollTop();
      if(scroll >= hdTop){
        $("header").css({position:"fixed", top:0, width:"100%"});
        $("header").addClass("stick");
      } else {
        $("header").css({position:"relative"});
        $("header").removeClass("stick");
      }
    });
  }

  headerStick();
  //navigation slide down and up when mobile menu click
  const barsClick = function(){
   $(".mobile_menu").click(function(){
    $(this).toggleClass("on");
    if($(this).hasClass("on")){
      $(".menu_items").slideDown(250);
    } else {
      $(".menu_items").slideUp(250);
    }
  });
} 

 barsClick();
//index page description text cut
 const cuttingText = function(){
  //console.log($(".featured_item").length);
  for(let i = 0; i<$(".featured_item").length; i++){
    const textLength = $(".featured_item").eq(i).find("p").text();
    //console.log(textLength);

    $(".featured_item").eq(i).find("p.desc").text(textLength.substr(0,60) + "...");
  }
 }
 cuttingText();
// index page item load more
 const loadMore = function(){
  $(".featured_item").hide();
  $(".featured_item").slice(0, 3).show();
  // featured_item 에서 0~3번째 아이템만 보여주고 나머지는 숨겨주는 

  $(".load_more button").click(function(){
    $(".featured_item:hidden").slice(0, 3).show();
  });
 }
 loadMore();
  
});