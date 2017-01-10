<div class="spacer">
    <div class="contactform center">
        <div class="row">
            <p class="spacer"><h2><span class="glyphicon glyphicon-music"></span> Add a music</h2></p>
            <div class="col-sm-4 col-sm-offset-4 ">
                <form method="post" action="?action=addTitle">
                    <select name='albumID'>
                    <?php
                    foreach ($AlbumsList as $titreAlbum){
                        echo "\t<option value='$titreAlbum[0]'>$titreAlbum[1]</option>\n";
                    }
                    ?>
                    </select>
                    <input class="btn btn-warning bgcolor" type="submit" value="Select Album">
                </form>
            </div>
        </div>
    </div>
</div>