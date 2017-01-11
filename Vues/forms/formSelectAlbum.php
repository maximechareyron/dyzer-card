<div class="spacer">
    <div class="contactform center">
        <div class="row">
            <p class="spacer"><h5><span class="glyphicon glyphicon-music"></span> Select the album of your title :
            </h5></p>
            <div class="col-sm-4 col-sm-offset-4 ">
                <form method="post" action="?action=addTitle">
                    <select name='albumID' class="form-control">
                        <?php
                        foreach ($AlbumsList as $titreAlbum) {
                            echo "\t<option value='$titreAlbum[0]'>$titreAlbum[1]</option>\n";
                        }
                        ?>
                        <option value='-1'>-- Ajouter un nouvel album --</option>
                    </select>
                    <div class="spacer">
                        <button class="btn btn-warning bgcolor" type="submit">Select Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>