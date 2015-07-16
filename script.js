$(document).ready(function(){
  $(".urunac").each(function(index){
    $(this).click(function(){
      $(".detay").eq(index).slideToggle();
    });
  });
  $("#sart").click(function(){
    $("#sartlar").slideToggle();
  });
});

function goster(id) {
    ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("duzen").innerHTML = ajax.responseText;
        }
    }
    ajax.open("GET", "duzenle.php?id=" + id, true);
    ajax.send();
}
