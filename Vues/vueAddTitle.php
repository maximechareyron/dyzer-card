<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">
    <!--Errors display starts-->
    <?php require 'displayErrors.php'; ?>
    <!--Errors display Ends-->

    <!--Contact Starts-->
   <!-- <div class="spacer">
        <div class="col-sm-6 col-sm-offset-3">
            <h2 class="text-center">Add a music</h2>
        </div>
    </div>-->




    <?php
    switch($formToDisplay){
        case 'select_album':
            require 'forms/formSelectAlbum.php';
            break;
        case 'add_title':
            require 'forms/formAddTitle.php';
            break;
        default:
    }
    ?>


</div>
<!-- overlay -->


<?php require 'footer.php'; ?>
