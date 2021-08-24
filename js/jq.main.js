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

///index page description text cut
const cuttingText = function(txtBox, txtCut, txtLen){
  //console.log($(".featured_item").length);
  for(let i = 0; i < $(txtBox).length; i++){
    const textLength = $(txtBox).eq(i).find(txtCut).text();
    //console.log(textLength);

    $(txtBox).eq(i).find(txtCut).text(textLength.substr(0, txtLen) + "...");
  }
}

cuttingText(".featured_item", "p.desc", 60);
cuttingText(".search_item", ".search_txt p", 120);

let len = 0;
$(window).resize(function(){
  const wWidth = $(window).width();
  if(wWidth < 850){
    len = 50;   
  } else {
    len = 120;     
  }
  cuttingText(".search_item", ".search_txt p", len);
});


// index page item load more
 const loadMore = function(){
  $(".featured_item").hide();
  $(".featured_item").slice(0, 3).show();
  // featured_item 에서 0~3번째 아이템만 보여주고 나머지는 숨겨주는 

  $(".load_more button").click(function(){
    $(".featured_item:hidden").slice(0, 3).show();
   if($(".featured_item:hidden").length == 0) {
    //  갯수가 0 이기때문에 length를 꼭써줘야함
      $(".load_more").html(`<input type="hidden>`);

   }
  });
 }
 loadMore();


// featured product 에 나오는 이미지 가로 높이 사이즈 처리(반응형)
const imgHeightFit = function(){
 const featuredImgWidth = $(".featured_img").outerWidth();
  $(".featured_img").outerHeight(featuredImgWidth);

  // 높이를 가로 값으로 지정해주는
  $(window).resize(function(){
    const featuredImgWidth = $(".featured_img").outerWidth();
    $(".featured_img").outerHeight(featuredImgWidth);

  });
}


imgHeightFit();

  const detailTabs = function(){
      $(".detail_tab_btns span").click(function(){
      const index = $(this).index();

      $(".detail_img>img").hide();
      $(".detail_img>img").eq(index).show();
      });

    $(".detail_tab_btns span").eq(0).trigger("click");
    

  }

  
  //디테일 페이지 이미지 높이 맞춤
  function detailFit(){
    const imgHeight = $(".detail_img_item").outerHeight();
    const btnHeight = $(".detail_tab_btns").outerHeight();
    //이 두개를 더한 높이가 detail_img 요걸로 만들어주는 
    $(".detail_img").height(imgHeight + btnHeight);

  }

  $(window).resize(function(){
    setTimeout(function(){//리사이즈, 스크롤 이벤트시 쓰로틀링
    detailFit();

    }, 150);
   
  });

  detailFit();

  // $("#price").click(function(){
  //   e.preventDefault();
  //   $(this).toggleClass("on");
  //   if($(this).hasClass("on")){
  //     $(this).html('높은가격순 <i class="fa fa-chevron-up"></i>')
  //     //$(this).text("높은 가격순");
  //     //$(this).find("i").attr('class', 'fa fa-chevron-up');
      
  //     location.href="/zay/pages/menu_page/shop.php?key=up_price";
  //   } else {
  //     $(this).html('낮은가격순 <i class="fa fa-chevron-down"></i>')
  //     //$(this).text("낮은 가격순");
  //     //$(this).find("i").attr('class', 'fa fa-chevron-down');
      
  //     location.href="/zay/pages/menu_page/shop.php?key=donw_price";
  //   }
  //  });

  const  admin_tabs = function(){
    $(".admin_tabs button").click(function(){
      const tab_idx = $(this).index();
      //alert(tab_idx);
      $(".admin_panels>div").hide();
      $(".admin_panels>div").eq(tab_idx).show();
    });

    $(".admin_tabs button").eq(1).trigger("click");
  };
    admin_tabs();
  });
