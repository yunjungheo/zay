$(function(){
  $(".like, .unlike").click(function(){
    //클릭 시 해당 아이디를 분리하여 like, unlike와 상품번호 저장
    const selectId = $(this).attr("id");
    //alert(selectId); like_14 
    const splitId = selectId.split("_");
    const likeUnlike = splitId[0];
    const postId = splitId[1];
    let  type=0;


    //console.log(likeUnlike);
    //console.log(postId);

    if(likeUnlike == "like"){
      type=1;
    }else{
      type=0;
    }

    $.ajax({
      url :'/zay/php/like_unlike.php',
      type :'post',
      data :{postId : postId, type : type},
      dataType:'json',
      success : function(data){
        //console.log(data);
        // 이렇게 원래 바꿔줘야함 const jsonObj = JSON.parse(data);
      const likes = data.likes;
      const unlikes = data.unlikes;

      $("#likes_" + postId).text(likes);
      $("#unlikes_" + postId).text(unlikes);

      if(type == 1){
        $("#like_" + postId).css({
          'background': '#59ab6e', 
          'color': '#fff'
        });
        $("#unlike_" + postId).css({
          'background': '#fff', 
          'color': '#555'
        });
      }else{
        $("#like_" + postId).css({
          'background': '#fff', 
          'color': '#555'
        });
        $("#unlike_" + postId).css({
          'background': 'lightcoral',
          'color': '#fff'
        });
      }
      //console.log(likes);
      //console.log(unlikes);
      }
    });
  });

});