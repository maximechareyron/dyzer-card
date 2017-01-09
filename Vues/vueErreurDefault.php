<?php require 'header.php'; ?>

<!-- overlay -->
<div class="container overlay">





 <!-- blockblack -->
 <div class="blockblack">

     <div class="spacer">
         <div class="center">
             <h1>ERROR !</h1>
         </div>
     </div>

     <div class="spacer">
         <?php
         foreach($dataError as $subError){
             echo $subError . "<br/>";
         }
         ?>
     </div>

</div>
<!-- blockblack -->

</div>
<!-- overlay -->



<?php require 'footer.php'; ?>
