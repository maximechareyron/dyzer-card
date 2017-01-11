<?= DyzerCard\Vues\VueHtmlUtils::enTeteHTML5('UTF-8', \DyzerCard\Config\Config::getStyleSheetsURL()['bootstrap']); ?>
<?= DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['animate']); ?>
<?= DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['default']); ?>

<title>Dyzer&ampCard</title>

</head>
<body>

<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="?action="><img
                            src="<?= DyzerCard\Config\Config::getResources()['logo'] ?>" height="30" alt="logo"/></a>
                    <!-- #Logo Ends -->

                    <!-- Affichage de la navbar sur petits écrans -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <!-- Nav Starts -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?= DyzerCard\Vues\VueHtmlUtils::getHTML_RoleNavigation(); ?>
                    </ul>
                    <?= DyzerCard\Vues\VueHtmlUtils::getHTML_RoleAuthentication(); ?>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>
    </div>
</div>