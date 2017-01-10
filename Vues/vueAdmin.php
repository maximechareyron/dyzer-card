<title>Dyzer&Card - ADMIN</title>

</head>
<body>
<a href="?action=logout">Sign Out</a>
<a href="?action=addTitle">Add a title</a>
<h1>DyzerCard</h1>

<?php
echo "ID de session  :" . session_id() . "<br/>";
var_dump($_COOKIE);
var_dump($_SESSION);
if (isset($musiques)) {
    foreach ($musiques as $title) {
        echo "<h3>$title->titre</h3> - $title->artiste<br/>";
        echo "<img src=\"$title->coverPath\" width='100' height='100'/><br/>";
        echo "<audio src=\"$title->musicPath\" controls>Balise audio non supportée par votre navigateur.</audio>";
        echo "<br/>";
    }
}
?>


</body>
</html>	
