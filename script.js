$(document).ready(function(){
  $(".urunac").each(function(index){
    $(this).click(function(){
      $(".detay").eq(index).slideToggle();
    });
  });
});
