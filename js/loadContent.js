$(document).ready(function(){
    // Função para carregar a página e atualizar o histórico
    function loadPage(page) {
        $("#main-content").addClass("fade");
        setTimeout(function() {
            $("#main-content").load("pages/" + page + ".html", function() {
                $("#main-content").removeClass("fade");
            });
        }, 300);

        // Atualiza o histórico
        history.pushState({ page: page }, null, "?page=" + page);
    }

    // Verifica se há uma página no URL ao carregar
    var urlParams = new URLSearchParams(window.location.search);
    var page = urlParams.get('page') || 'inicio'; // Default para 'inicio' se não houver parâmetro

    // Carrega a página correspondente ao estado ou a inicial
    loadPage(page);
    $(".asidelink[data-page='" + page + "']").addClass("active");

    // Adicionar a classe 'active' ao link clicado e carregar a página
    $(".asidelink").click(function(e){
        e.preventDefault();
        $(".asidelink").removeClass("active");
        $(this).addClass("active");

        var page = $(this).data("page");
        loadPage(page);
    });

    // Lida com o botão de voltar do navegador
    window.onpopstate = function(event) {
        if (event.state && event.state.page) {
            loadPage(event.state.page);
            $(".asidelink").removeClass("active");
            $(".asidelink[data-page='" + event.state.page + "']").addClass("active");
        }
    };
});
