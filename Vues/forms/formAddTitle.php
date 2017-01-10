<div class="spacer">
    <div class="contactform center">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <form action="?action=validateTitle" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Music Name" name="title" required>
                    <input type="text" placeholder="Artist(s) Name(s)" name="artist" required>
                    <input type="text" placeholder="Publication Year" name="year" required>
                    <input type="text" placeholder="Album ID" name="albumID" required>
                    <input type="file" placeholder="Album Cover (filetype : .png)" name="albumCover">
                    <input type="file" placeholder="Music File (filetype : .mp3)" name="audio">
                    <button class="btn btn-warning bgcolor" type="submit">Add title</button>
                </form>
            </div>
        </div>
    </div>
</div>