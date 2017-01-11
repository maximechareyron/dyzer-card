<div class="spacer">
    <div class="contactform center">
        <p class="spacer"><h5><span class="glyphicon glyphicon-music"></span>Add a comment :</h5></p>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <form action="?action=validateComment" method="post">
                    <input type="text" placeholder="Type your text" name="text" required>
                    <input type="hidden" name="musicID" value="<?= $musicID ?>">
                    <button class="btn btn-warning bgcolor" type="submit">Send comment !</button>
                </form>
            </div>
        </div>
    </div>
</div>