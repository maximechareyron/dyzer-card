<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">
    <!--Errors display starts-->
    <?php require 'displayErrors.php'; ?>
    <!--Errors display Ends-->

    <?php
    switch ($formToDisplay) {
        case 'select_album':
            require 'forms/formSelectAlbum.php';
            break;
        case 'add_title':
            require 'forms/formAddTitle.php';
            break;
        case 'add_album':
            require 'forms/formAddAlbum.php';
            break;
        case 'add_comment':
            require 'forms/formAddComment.php';
            break;
        case 'authentication':
            require 'forms/formAuthenticate.php';
            break;
        case  'registration':
            require 'forms/formRegister.php';
            break;
        default:
            $dataError['WrongPhpCall']="Invalid argument : $formToDisplay";
            require 'displayErrors.php';
    }
    ?>


</div>
<!-- overlay -->


<?php require 'footer.php'; ?>
