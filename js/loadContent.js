$(document).ready(function(){
    // Carregar a página inicial por padrão
    $("#main-content").load("pages/inicio.html");
    $(".asidelink[data-page='inicio']").addClass("active");
    // Adicionar a classe 'active' ao link clicado
    $(".asidelink").click(function(e){
        e.preventDefault();
        $(".asidelink").removeClass("active");
        $(this).addClass("active");
        
        var page = $(this).data("page");
        $("#main-content").addClass("fade");
        setTimeout(function() {
            $("#main-content").load("pages/" + page + ".html", function() {
                $("#main-content").removeClass("fade");
            });
        }, 300);
    });
});
