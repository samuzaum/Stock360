$(document).ready(function(){
    $(".asidelink").click(function(e){
        e.preventDefault();
        
        var page = $(this).data("page");
        
        $("#main-content").load("pages/" + page + ".html");
    });
});
