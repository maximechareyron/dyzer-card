<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">

    <!--Errors display starts-->
    <?php require 'displayErrors.php'; ?>
    <!--Errors display Ends-->


    <!--Form Starts-->
    <div class="spacer">
        <div class="contactform center">
            <p class="spacer">
            <h5><span class="glyphicon glyphicon-envelope"></span>Sign Up !</h5>
            </p>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <form method="post" action="?action=validateRegister">
                        <input type="text" placeholder="email" name="email" required>
                        <input type="password" placeholder="password" name="password" required>
                        <input class="btn btn-warning bgcolor" type="submit" value="Sign Up !">
                    </form>
                </div>
            </div>
        </div>
        <!--Form Ends-->
    </div>

</div>
<!-- overlay -->


<?php require 'footer.php'; ?>
