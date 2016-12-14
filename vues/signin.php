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


  <!-- Header Starts -->
  <div class="navbar-wrapper">
    <div class="container">

      <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
        <div class="container">
          <div class="navbar-header">
            <!-- Logo Starts -->
            <a id="index"  class="navbar-brand" href="index.html"><img src="assets/images/logo.svg" height="30" alt="logo"/></a>
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




 <!--Contact Starts-->
 <div id="contact" class="spacer">
  <div class="contactform center">
    <h3><span class="glyphicon glyphicon-envelope"></span> Sign In</h3>
    <div class="row">      
      <div class="col-sm-6 col-sm-offset-3 ">
        <h4>Get in touch or<br><b>Just say Hello!</b></h4>
        <input type="text" placeholder="Username">
        <input type="password" placeholder="Password">
        <button class="btn btn-warning bgcolor" type="submit">Sign In !</button>
      </div>
    </div>
  </div>
  <!--Contact Ends-->
</div>

</div>
<!-- overlay -->



<!-- Footer Starts -->
<div id="footer">
  <div class="container policeLogo" text-align='center'>
    <span class="glyphicon glyphicon-pencil"></span>
    De Taxis Tanguy & Chareyron Maxime ~ Groupe 4 ~ IUT Informatique ~ 2ème année ~ 2016
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