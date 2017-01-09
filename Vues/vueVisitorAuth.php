<?= DyzerCard\Vues\VueHtmlUtils::enTeteHTML5('UTF-8', \DyzerCard\Config\Config::getStyleSheetsURL()['bootstrap']); ?>
<?= DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['animate']); ?>
<?= DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['default']); ?>

<title>Dyzer&Card</title>

</head>
<body>

<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="#home"><img
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
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#playlist">Playlist</a></li>
                        <li><a href="#album">Albums</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="?action=logout">
              <span class="glyphicon glyphicon-log-in">
              </span> Log out
                            </a>
                        </li>
                        <li>
                            <a>
                                 <span class="glyphicon glyphicon-log-in">
                                </span> Logged as Visitor
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>
    </div>
</div>
<!-- #Header Starts -->

<!-- overlay -->
<div class="container overlay">

    <!-- home banner starts -->
    <div id="home" class="homeinfo">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="fronttext">
                    <h2 class="bgcolor animated fadeInUpBig policeLogo"><span
                            class="glyphicon glyphicon-headphones"></span> Dyzer&Card</h2><br>
                    <p class=" animated fadeInUp">Best DJ in town. There are other and natural causes tending toward a
                        diminution of population, but nothing contributes so greatly to this end as the fact that no
                        male or female Martian is ever voluntarily without a weapon of destruction.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- home banner ends -->


    <!-- blockblack -->
    <div class="blockblack">


    </div>
    <!-- blockblack -->

</div>
<!-- overlay -->


<!-- Footer Starts -->
<div id="footer">
    <div class="container policeLogo" text-align='center'>
        <span class="glyphicon glyphicon-pencil"></span>
        De Taxis Du Poët Tanguy & Chareyron Maxime ~ Groupe 4 ~ IUT Informatique ~ 2ème année ~ 2016
    </div>
</div>
<!-- # Footer Ends -->


<!-- background slider -->
<div id="myCarousel" class="carousel slide hidden-xs">
    <div class="carousel-inner">
        <div class="active item"><img src="<?= DyzerCard\Config\Config::getResources()['back1'] ?>" alt=""/></div>
        <div class="item"><img src="<?= DyzerCard\Config\Config::getResources()['back2'] ?>" alt=""/></div>
        <div class="item"><img src="<?= DyzerCard\Config\Config::getResources()['back3'] ?>" alt=""/></div>
    </div>
</div>
<!-- background slider -->

<script src="<?= DyzerCard\Config\Config::getResources()['script'] ?>" type="text/javascript"></script>
<script src="<?= DyzerCard\Config\Config::getResources()['jquery'] ?>" type="text/javascript"></script>
<!-- boostrap -->
<script src="<?= DyzerCard\Config\Config::getResources()['bootstrap'] ?>" type="text/javascript"></script>
<script src="<?= DyzerCard\Config\Config::getResources()['plugins'] ?>" type="text/javascript"></script>


</body>
</html>
