<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dyzer&Card</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />  	  		
  <!-- boostrap -->
  <link rel="stylesheet" href="assets/animate.css">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>


<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=249078091804020&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->

<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="container">

    <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
      <div class="container">
        <div class="navbar-header">
          <!-- Logo Starts -->
          <a class="navbar-brand" href="#home"><img src="assets/images/logo.svg" height="30" alt="logo"/></a>
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
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li>
              <a id="signin" href="./signin.html">
              <span class="glyphicon glyphicon-log-in">               
              </span> Login
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

     <div class="col-sm-5 col-xs-12 col-sm-offset-1">
       <div class="player">
         <img src="assets/images/dj.svg" class="graphics hidden-xs  animated fadeInRightBig" alt="dj"/>
         <iframe width="100%" height="170" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/66392700&amp;color=f2ab00&amp;theme_color=000000&amp;auto_play=true&amp;hide_related=true&amp;show_artwork=false"></iframe>
       </div>
     </div>
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


 <!-- latest release starts-->
 <div id="album" class="releases spacer">
  <h3><span class="glyphicon glyphicon-music"></span> Album Releases</h3>
  <div class="row">
   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/3.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/1.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/2.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/4.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/4.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/2.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/3.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>

   <div class="col-sm-3 col-xs-12"><div class="album"><img src="assets/images/1.jpg" class="img-responsive" alt="music theme" /><div class="albumdetail"><h5>Crazy Freso</h5><a href="#" class="listen" data-toggle="modal" data-target="#albumdetail"><span class="glyphicon glyphicon-headphones"></span> Listen Song</a></div></div></div>
 </div>
</div>
<!-- latest release ends-->



<!--Contact Starts-->
<div id="contact" class="spacer">
  <div class="contactform center">
    <h3><span class="glyphicon glyphicon-envelope"></span> Contact</h3>
    <div class="row">      
      <div class="col-sm-6 col-sm-offset-3 ">
        <h4>Get in touch or<br><b>Just say Hello!</b></h4>
        <input type="text" placeholder="Name">
        <input type="text" placeholder="Email">
        <textarea rows="5" placeholder="Message"></textarea>
        <button class="btn btn-warning bgcolor">Send</button>
      </div>
    </div>

    <!-- map -->
    <!-- <div class="map clearfix">
      <div class="fb-like-box" data-href="https://www.facebook.com/thebootstrapthemes" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
    </div> -->
    <!-- map -->

  </div>
  <!--Contact Ends-->
</div>



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




<!-- Modal -->
<div class="modal fade" id="albumdetail" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <h2>Crazy Fresco</h2>
      <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/24314082&amp;theme_color=000000&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=false"></iframe>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="assets/scripts/jquery-1.7.1.min.js" type="text/javascript" ></script>
<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
<script src="assets/scripts/plugins.js" type="text/javascript"></script>
<script src="assets/scripts/script.js" type="text/javascript"></script>

</body>
</html>
