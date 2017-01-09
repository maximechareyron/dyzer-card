<?php require 'header.php'; ?>

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
      </div>
    </div>
    <!-- home banner ends -->



    <!-- blockblack -->
    <div class="blockblack">

      <div class="row">
        <div class="col-md-12 col-xs-12">
          <h1 class="animated fadeInUpBig"><span class="glyphicon glyphicon-music"></span> TOP 10</h1>
        </div>
      </div>

      <div class="releases spacer">

        <?=DyzerCard\Vues\VueHtmlUtils::getHTML_Playlist($musiques);?>

      </div>
    </div>





  </div>
  <!-- blockblack -->

  </div>
  <!-- overlay -->

<?php require 'footer.php'; ?>