<!DOCTYPE html>
<head>
    <title>HelpC Diagnósticos Inteligentes</title>
    <link href="~/css/bootstrap.min.css" rel="stylesheet">
    <link href="~/css/styleSite.css" rel="stylesheet">
    <script src="~/jquery/jquery.min.js"></script>
    <script src="~/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

            //Opções - alert(document.body.clientWidth); / alert(window.screen.width); / alert(screen.availWidth);

            //Comportamento do CSS quando a resolução do navegador for menor que 500px;
            if (document.body.clientWidth < 600) {
                document.getElementById("imgCenter").className="resolImgCenter";
            }
        });
    </script>
</head>
<body>
    <div class="bobyPage" style="position: relative !important;">
        <div class="navbar navbar-default navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Seja bem vindo ao <b>HelpC</b></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li id="activeHome">
                            <a href="#">Home</a>
                        </li>
                        <li id="activeSobre">
                            <a href="#">Sobre</a>
                        </li>
                        <li id="activeContato">
                            <a href="#">Contato</a>
                        </li>
                    </ul>
                    <!--Botão - Modal Login-->
                    <a id="btnLogin" data-toggle="modal" href="#ModalLogin" class="btn btn-info btn-large"><b>LOGIN</b></a>
                </div>
            </div>
        </div>
    </div>
    <?= FLASH ?>
    <?= CONTENT ?>
</body>
</html>