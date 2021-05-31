$(function(){
  //scroll값
  $(window).scroll(function(){
    let wScroll = $(this).scrollTop();
    $("#scroll").text(Math.ceil(wScroll));
  });
  //window scroll시 네비축소
  $(window).scroll(function(){
    let mainHeader = $("#header"),
        navLi = $(".nav >ul> li >a"),
        logo = $(".nav li:nth-of-type(1) > a"),
        wScroll = $(this).scrollTop();
    /*shrink*/
    if(wScroll > 100){
      if(!navLi.hasClass("shrink")){
        navLi.addClass("shrink");
        logo.css("font-size","2.2rem");
      }
    }else{
      if(navLi.hasClass("shrink")){
        navLi.removeClass("shrink");
        logo.css("font-size","3.2rem");  
      }
    }

  });
});