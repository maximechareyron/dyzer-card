<div class="spacer">
    <div class="contactform center">
        <p class="spacer"><h5><span class="glyphicon glyphicon-music"></span> Add the album :</h5></p>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <form action="?action=validateAlbum" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Album Name" name="album_title" required>
                    <input type="file" placeholder="Album Cover (filetype : .png)" name="albumCover">
                    <button class="btn btn-warning bgcolor" type="submit">Add album</button>
                </form>
            </div>
        </div>
    </div>
</div>