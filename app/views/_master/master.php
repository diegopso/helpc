<!DOCTYPE html>
<head>
    <title>HelpC Diagnósticos Inteligentes</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="~/css/bootstrap.css" rel="stylesheet">
    <link href="~/css/styleSite.css" rel="stylesheet">
    <link rel="stylesheet" href="~/css/skel-noscript.css" />
    <link rel="stylesheet" href="~/css/style.css" />
    <link rel="stylesheet" href="~/css/style-desktop.css" />
    <script src="~/jquery/jquery.min.js"></script>
    <script src="~/js/bootstrap.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet" />
    <script src="~/js/config.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
    <script src="~/js/main.js"></script>
    <script type="text/javascript">
        var ROOT = '<?= ROOT_VIRTUAL ?>';
        function ocultarLogin(){
            $('#acessoLogin').show();
        }
        function ocultarLogin(){
            $('#acessoLogin').show();
        }
    </script>
</head>
<body class="homepage">
    <!-- Header -->
    <header id="header" class="ajusteHeader">
        <div class="logo">
            <div>
                <h1><a href="#" id="logo">HELPC</a></h1>
                <span class="byline">- DIAGNÓSTICO INTELIGENTE</span>
            </div>
        </div>
    </header>
    <!-- Nav -->
    <nav id="nav" class="skel-panels-fixed">
        <ul>
            <li class="current_page_item"><a href="~/home">Home</a></li>
            <li><a href="~/home/sobre">Sobre</a></li>
            <li><a href="~/home/contato">Contato</a></li>
            <?php
            if (Auth::isLogged()) {
                echo '<li><a id="acessoLogout" href="#">Sair</a></li>';
            } else {
                echo '<li id="acessoLogin"><a href="~/home/login">Acesso Restrito</a></li>';
            }
            ?>
        </ul>
    </nav>
    <!-- /Nav -->
    <!-- /Header -->

    <?= FLASH ?>
    <?= CONTENT ?>

    <!-- Footer -->
    <footer id="footer" class="container">
        <div class="row">
            <div class="12u">
                <!-- About -->
                <section>
                    <h2 class="major"><span>Desenvolvimento do Projeto?</span></h2>
                    <p>
                        Este projeto foi desenvolvido em carácter acadêmico, no Centro Universitário 
                        Luterano de Palmas, na disciplina de IA (Inteligência Aatificial)<br> ministrada pelo
                        Professor Fermando Luiz.
                    </p>
                    <!-- Copyright -->
                    <div id="copyright">
                        <p class="infoCopyright">&copy; 2013 HelpC | Desenvolvimento: <b>Diego Oliveira, Djonathas Cardoso</b> | Design: <b>Sérgio Barros</b></p>
                    </div>
                    <!-- /Copyright -->
                </section>
                <!-- /About -->
            </div>
        </div>
    </footer>
    <!-- /Footer -->
</body>
</html>
