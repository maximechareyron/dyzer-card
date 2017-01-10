<?php require 'header.php'; ?>

    <!-- overlay -->
    <div class="container overlay">

        <!-- blockblack -->
        <div class="musicblock">
            <?=DyzerCard\Vues\VueHtmlUtils::getHTML_MusiqueDetail($music);?>
            <?/*=DyzerCard\Vues\VueHtmlUtils::getHTML_Commentaire($commentaires);*/?>
        </div>
        <!-- blockblack -->

    </div>
    <!-- overlay -->

<?php require 'footer.php'; ?>