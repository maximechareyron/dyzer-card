<?php require 'header.php'; ?>

    <!-- overlay -->
    <div class="container overlay">

        <!-- blockblack -->
        <div class="spacer">
            <div class="contactform center">
                <p class="spacer"><h5><span class="glyphicon glyphicon-cog"></span> Account Settings</h5></p>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 ">
                        <form action="?action=deleteUserAccount" method="post" enctype="multipart/form-data">
                            <button class="btn btn-danger bgcolor" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- blockblack -->

    </div>
    <!-- overlay -->

<?php require 'footer.php'; ?>