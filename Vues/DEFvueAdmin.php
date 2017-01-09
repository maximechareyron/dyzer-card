<?=DyzerCard\Vues\VueHtmlUtils::enTeteHTML5('UTF-8',\DyzerCard\Config\Config::getStyleSheetsURL()['bootstrap']); ?>
<?=DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['animate']); ?>
<?=DyzerCard\Vues\VueHtmlUtils::cssHTML5(\DyzerCard\Config\Config::getStyleSheetsURL()['default']); ?>

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
          		<a class="navbar-brand" href="?action="><img src="<?=DyzerCard\Config\Config::getResources()['logo']?>" height="30" alt="logo"/></a>
                    <!-- #Logo Ends -->

                    <!-- Affichage de la navbar sur petits écrans -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <!-- Nav Starts -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" >
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#playlist">Playlist</a></li>
                        <li><a href="#album">Albums</a></li>
                        <li><a id="saisieTitre" href="?action=saisieMusiqueCreate">Ajouter un Titre</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a>
                                <span class="glyphicon glyphicon-user">
                                </span> Log as Admin
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
                    <h2 class="bgcolor animated fadeInUpBig policeLogo"><span class="glyphicon glyphicon-headphones"></span> Dyzer&Card</h2><br>
                    <p class=" animated fadeInUp">Best DJ in town. There are other and natural causes tending toward a diminution of population, but nothing contributes so greatly to this end as the fact that no male or female Martian is ever voluntarily without a weapon of destruction.</p>
                </div>
            </div>

            <!--<div class="col-sm-5 col-xs-12 col-sm-offset-1">
              <div class="player">
                <img src="assets/images/dj.svg" class="graphics hidden-xs  animated fadeInRightBig" alt="dj"/>
                <iframe width="100%" height="170" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/66392700&amp;color=f2ab00&amp;theme_color=000000&amp;auto_play=true&amp;hide_related=true&amp;show_artwork=false"></iframe>
              </div>
            </div>-->
        </div>
    </div>
    <!-- home banner ends -->



    <!-- blockblack -->
    <div class="blockblack">


        <!-- playlist Starts -->
         <div id="playlist" class="spacer">
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <h3><span class="glyphicon glyphicon-list"></span> Playlist</h3>
              <iframe width="100%" height="600" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/24314082&amp;theme_color=000000&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=false"></iframe>
            </div>
          </div>
        </div>
        <!-- #playlist Ends -->


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
        <div class="active item"><img src="assets/images/back1.jpg" alt="" /></div>
        <div class="item"><img src="assets/images/back2.jpg" alt="" /></div>
        <div class="item"><img src="assets/images/back3.jpg" alt="" /></div>
    </div>
</div>
<!-- background slider -->

<!-- background slider -->
<div id="myCarousel" class="carousel slide hidden-xs">
  <div class="carousel-inner">
    <div class="active item"><img src="<?=DyzerCard\Config\Config::getResources()['back1']?>" alt="" /></div>
    <div class="item"><img src="<?=DyzerCard\Config\Config::getResources()['back2']?>" alt="" /></div>
    <div class="item"><img src="<?=DyzerCard\Config\Config::getResources()['back3']?>" alt="" /></div>
  </div>
</div>
<!-- background slider -->

<script src="<?=DyzerCard\Config\Config::getResources()['script']?>" type="text/javascript"></script>
<script src="<?=DyzerCard\Config\Config::getResources()['jquery']?>" type="text/javascript" ></script>
<!-- boostrap -->
<script src="<?=DyzerCard\Config\Config::getResources()['bootstrap']?>" type="text/javascript" ></script>
<script src="<?=DyzerCard\Config\Config::getResources()['plugins']?>" type="text/javascript"></script>


</body>
</html>	
