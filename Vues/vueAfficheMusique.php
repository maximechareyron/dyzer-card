<?php require 'header.php'; ?>

    <!-- overlay -->
    <div class="container overlay">
        <br/>
        <br/>
        <br/>
        <br/><br/><br/>


        <!-- blockblack -->
        <div class="blockblack">
                    <?=DyzerCard\Vues\VueHtmlUtils::getHTML_MusiqueDetail($musique);?>
                    <?=DyzerCard\Vues\VueHtmlUtils::getHTML_Commentaire($commentaires);?>
        </div>
        <!-- blockblack -->

    </div>
    <!-- overlay -->

<?php require 'footer.php'; ?>