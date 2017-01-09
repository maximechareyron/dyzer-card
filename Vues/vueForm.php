<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">

    <!--Errors display starts-->
    <?php
    if(!empty($dataError)){
        echo "<div class=\"errorblock\">";
            foreach ($dataError as $err){
                echo "$err";
            }
            echo "</div>";
    }
    ?>
    <!--Errors display Ends-->


    <!--Form Starts-->
    <div class="spacer">
        <div class="contactform center">
            <h3><span class="glyphicon glyphicon-envelope"></span> Sign In</h3>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 ">
                    <form method="post" action="?action=validateLogin">
                        <input type="text" placeholder="email" name="email" required>
                        <input type="password" placeholder="password" name="password" required>
                        <input class="btn btn-warning bgcolor" type="submit" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
        <!--Form Ends-->
    </div>

</div>
<!-- overlay -->

<?php require 'footer.php'; ?>