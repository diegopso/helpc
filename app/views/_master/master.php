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
    <?= FLASH ?>
    <?= CONTENT ?>
</body>
</html>