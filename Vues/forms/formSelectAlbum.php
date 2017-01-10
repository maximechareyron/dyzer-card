<div class="spacer">
    <div class="contactform center">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <form name="add" method="post">
                    <select name='Album Title'>
                        <?php
                        foreach ($AlbumsList as $titreAlbum){
                            echo "\t\t<option value='$titreAlbum[0]'>$titreAlbum[1]</option>";
                        }
                        ?>
                    <button class="btn btn-warning bgcolor" type="submit">Chose album</button>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>