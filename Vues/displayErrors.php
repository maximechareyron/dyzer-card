<?php
if (!empty($dataError)) {
    echo "<div class=\"errorblock\">";
    echo "<p><h2>ERROR !</h2></p>";
    foreach ($dataError as $err) {
        echo "$err<br/>";
    }
    echo "</div>";
}
?>