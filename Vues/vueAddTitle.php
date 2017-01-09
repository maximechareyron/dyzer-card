<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">


    <!--Contact Starts-->
    <div class="spacer">
        <div class="col-sm-6 col-sm-offset-3">
            <h2 class="text-center">Add a music</h2>
        </div>
    </div>
    <div class="spacer">
        <div class="contactform center">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 ">
                    <form action="?action=validateTitre" method="post">
                        <input type="text" placeholder="Music Name" required>
                        <input type="text" placeholder="Artist Name" required>
                        <input type="text" placeholder="Published Year" required>
                        <input type="text" placeholder="Album Name" required>
                        <button class="btn btn-warning bgcolor" type="submit">Add a music</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Contact Ends-->
    </div>

</div>
<!-- overlay -->


<?php require 'footer.php'; ?>
