<?php require 'header.php'; ?>

    <!-- overlay -->
    <div class="container overlay">
        <br/>
        <br/>
        <br/>
        <br/><br/><br/>


        <!-- blockblack -->
        <div class="blockblack">
            <div class="row">
                <div class="col-sm-7 col-md-5">
                    <div class="thumbnail">
                        <img src="<?=DyzerCard\Config\Config::getResources()['logo']?>" alt="...">
                    </div>
                    <div class="caption">
                        <h1>FORMIDABLE</h1>
                        <p class="spacer">  Artist : Stromae</p>
                        <p>Year : 2011</p>

                        <p>
                            <a id="buttonLike" href="?action=Jaime" class="btn btn-default" role="button">
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                J'aime
                                <span class="label label-success">1000</span>
                            </a>
                            <a id="buttonDislike" href="?action=JaimePas" class="btn btn-default" role="button">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                J'aime pas
                                <span class="label label-danger">1000</span>
                            </a>
                        </p>
                        
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12 spacer">
                    <h1>Espace Commentaire :</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 spacer">
                    <div>
                        <p>mdr jpp tro for</p>
                        <p><span class="glyphicon glyphicon-user"></span> Par : Auteur</p>
                    </div>
                    <div>
                        <p>rend largen au aboné</p>
                        <p><span class="glyphicon glyphicon-user"></span> Par : Auteur</p>
                    </div>
                    <div>
                        <p>nik ton oncle le garage a chaussure</p>
                        <p><span class="glyphicon glyphicon-user"></span> Par : Auteur</p>
                    </div>
                </div>

            </div>

        </div>
        <!-- blockblack -->

    </div>
    <!-- overlay -->

<?php require 'footer.php'; ?>