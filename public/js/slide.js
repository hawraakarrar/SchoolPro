$(document).ready(function(){

$(".arrow1").click(function(){
    $(".aside").toggleClass("resize");

    $(".arrow1").css("z-index","1");
    $(".arrow2").css("z-index","4");
});
$(".arrow2").click(function(){
    $(".aside").removeClass("resize");

    $(".arrow1").css("z-index","2");
    $(".arrow2").css("z-index","1");
});
});

