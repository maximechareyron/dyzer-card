<?php require 'header.php'; ?>

    <!-- overlay -->
    <div class="container overlay">

        <!-- blockblack -->
        <div class="blockblack">
            <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?= DyzerCard\Config\Config::getResources()['logo'] ?>" alt="...">
                    </div>
                    <div class="caption">
                        <h1>Formidable</h1>
                        <p>Ivre, il se promène dans la rue, la réaction des passants vont vous étonnés</p>
                        <p>
                            <a href="?action=Jaime" class="btn" role="button">J'aime</a>
                            <a href="?action=JaimePas" class="btn" role="button">J'aime pas</a>
                        </p>
                    </div>

                </div>

            </div>

        </div>
        <!-- blockblack -->

    </div>
    <!-- overlay -->


    <div class="blockblack">

        <div class="col-sm-12 col-md-12">
            <div class="thumbnail">
                <img src="<?= DyzerCard\Config\Config::getResources()['logo'] ?>" alt="...">
                <div class="caption">
                    <h3>Formidable</h3>
                    <p>Ivre, il se promène dans la rue, la réaction des passants vont vous étonnés</p>
                    <p>
                        <a href="?action=afficherDetails" class="btn" role="button">Afficher Détails</a>
                        <a href="?action=Jaime" class="btn" role="button">J'aime</a>
                        <a href="?action=JaimePas" class="btn" role="button">J'aime pas</a>
                    </p>
                </div>
            </div>
        </div>

    </div>

<?php require 'footer.php'; ?>