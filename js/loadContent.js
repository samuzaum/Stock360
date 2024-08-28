$(document).ready(function(){
    // Função para carregar a página e atualizar o histórico
    function loadPage(page) {
        $("#main-content").addClass("fade");
        setTimeout(function() {
            $("#main-content").load("pages/" + page + ".html", function() {
                $("#main-content").removeClass("fade");

                // Inicializa o DataTables se a página carregada contiver a tabela
                if ($("#dataTable").length) {
                    $('#dataTable').DataTable({
                        paging: true,
                        searching: true,
                        order: [[0, 'asc']], // Ordena a primeira coluna (Nome) por padrão
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/Portuguese-Brasil.json" // Traduz para Português
                        }
                    });
                }
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
    function handleLinkClick(e) {
        e.preventDefault();
        $(".nav-link, .dropdown-item").removeClass("active");
        $(this).addClass("active");

        var page = $(this).data("page");
        if (page) {
            loadPage(page);
        }
    }

    // Lida com o clique dos links da navbar e dropdown
    $(".nav-link, .dropdown-item").click(handleLinkClick);

    // Lida com o botão de voltar do navegador
    window.onpopstate = function(event) {
        if (event.state && event.state.page) {
            loadPage(event.state.page);
            $(".nav-link, .dropdown-item").removeClass("active");
            $(".nav-link[data-page='" + event.state.page + "'], .dropdown-item[data-page='" + event.state.page + "']").addClass("active");
        }
    };
});
