<?php
if(!empty($dataError)){
    echo "<div class=\"errorblock\">";
    foreach ($dataError as $err){
        echo "$err<br/>";
    }
    echo "</div>";
}
?>