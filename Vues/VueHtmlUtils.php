<?php
/******************************************************************************\
 *     Copyright (C) 2016 by Rémy Malgouyres                                    *
 *     http://malgouyres.org                                                    *
 *                                                                              *
 * File VueHtmlUtils.php created on 10/11/2016 by remy                          *
 *                                                                              *
 * The program is distributed under the terms of the GNU General Public License *
 *                                                                              *
 * \******************************************************************************/
/** @brief Classe d'utilitaires de génération de code HTML.
 * Définit des méthodes pour générer l'en-tête et la fin d'un document,
 * ainsi qu'un formulaire d'authentification (saisie login/password) */
namespace DyzerCard\Vues;

class VueHtmlUtils
{
    /** @brief Génère le header HTML5 (doctype et &lt;head&gt;)
     * @param $title titre de la page (contenu de la balise &lt;title&gt;)
     * @param $charset Jeu de caractères pour encodage (généralement "UTF-8")
     * @param $css_sheet URL de la feuille de style globale de la page.
     */
    public static function enTeteHTML5($charset, $css_sheet)
    {
        $htmlCode = "<!doctype html>\n<html lang=\"fr\">\n";
        $htmlCode .= "<head>\n<meta charset=\"" . $charset . "\"/>\n";
        $htmlCode .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/> \n";
        $htmlCode .= "<link href=\"" . $css_sheet . "\" rel=\"stylesheet\" type=\"text/css\" />\n";
        //$htmlCode .= "<title>".$title."</title>\n";
        //$htmlCode .= "</head>\n<body>\n";
        return $htmlCode;
    }

    public static function cssHTML5($css_sheet)
    {
        $htmlCode = "<link href=\"" . $css_sheet . "\" rel=\"stylesheet\" type=\"text/css\" />\n";
        return $htmlCode;
    }

    /** Génère la fin de fichier HTML (ferme le &lt;body&gt; et le &lt;html&gt;) */
    public static function finFichierHTML5()
    {
        return "\n</body>\n</html>\n";
    }

    public static function getHTML_Playlist($tab)
    {
        $htmlCode = "<div class=\"row\">\n\n";
        $cpt = 0;
        foreach ($tab as $musique) {
            $htmlCode .= "\t<div class=\"col-sm-6 col-md-4\">\n";
            $htmlCode .= "\t\t<a href=\"?action=detailTitre&musicID=" . $musique->idMusique . "\">\n";
            $htmlCode .= "\t\t\t<div class=\"thumbnail\">\n";
            $htmlCode .= "\t\t\t\t<img src=\"$musique->coverPath\" width='300' height='300'/>\n";
            $htmlCode .= "\t\t\t\t\t<div class=\"caption\">\n";
            $htmlCode .= "\t\t\t\t\t\t<h5>" . $musique->titre . "</h5>\n";
            $htmlCode .= "\t\t\t\t\t\t<p>Artist : " . $musique->artiste . "</p>\n";
            $htmlCode .= "\t\t\t\t\t\t<p>\n";
            $htmlCode .= "\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-thumbs-up\"></span> : " . $musique->avisfav . "\n";
            $htmlCode .= "\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-thumbs-down\" style=\"margin-left: 20px;\"></span> : " . $musique->avisdefav . "\n";
            $htmlCode .= "\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-time\" style=\"margin-left: 20px;\"></span> : " . $musique->dateMaj . "\n";
            $htmlCode .= "\t\t\t\t\t\t</p>\n";
            $htmlCode .= "\t\t\t\t\t</div>\n";
            $htmlCode .= "\t\t\t</div>\n";
            $htmlCode .= "\t\t</a>\n";
            $htmlCode .= "\t</div>\n\n";
            $cpt++;
            if ($cpt == 3) {
                $htmlCode .= "</div>\n";
                $htmlCode .= "<div class=\"row\">\n";
                $cpt = 0;
            }
        }
        return $htmlCode;
    }

    public static function getHTML_RoleNavigation()
    {
        if ($_SESSION['role'] != 'admin') {
            return;
        }
        $htmlCode = "<li><a id=\"saisieTitre\" href=\"?action=addTitle\">Add title</a></li>\n";

        return $htmlCode;

    }

    public static function getHTML_RoleAuthentication()
    {
        $htmlCode = "<ul class=\"nav navbar-nav navbar-right\">\n";
        $htmlCode .= "\t<li>\n";
        switch ($_SESSION['role']) {
            case 'admin':
                $htmlCode .= "<a>\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-user\">\n";
                $htmlCode .= "</span> Logged as Admin\n";
                $htmlCode .= "</a>\n";
                $htmlCode .= "<li>\n";
                $htmlCode .= "<a href=\"?action=logout\">\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-log-out\">\n";
                $htmlCode .= "</span> Sign out\n";
                $htmlCode .= "</a>\n";
                $htmlCode .= "</li>\n";
                break;
            case 'visitor':
                $htmlCode .= "<a>\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-user\">\n";
                $htmlCode .= "</span> Logged as Visitor\n";
                $htmlCode .= "</a>\n";
                $htmlCode .= "</li>\n";
                $htmlCode .= "<li>\n";
                $htmlCode .= "<a href=\"?action=logout\">\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-log-out\">\n";
                $htmlCode .= "</span> Sign out\n";
                $htmlCode .= "</a>\n";
                $htmlCode .= "</li>\n";
                $htmlCode .= "<li>\n";
                $htmlCode .= "<a href=\"?action=configAccount\">\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-cog\">\n";
                $htmlCode .= "</a>\n";
                break;
            default:
                $htmlCode .= "<a id=\"signup\" href=\"?action=register\">";
                $htmlCode .= "<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "</span> Sign up !\n";
                $htmlCode .= "</a>\n";
                $htmlCode .= "</li>\n";
                $htmlCode .= "<li>\n";
                $htmlCode .= "<a id=\"signin\" href=\"?action=login\">\n";
                $htmlCode .= "<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "</span> Sign in\n";
                $htmlCode .= " </a>\n";
                break;
        }

        $htmlCode .= "\t</li>\n";
        $htmlCode .= "</ul>\n";


        return $htmlCode;
    }

    public static function getHTML_MusiqueDetail($musique)
    {
        $htmlCode = "<div class=\"row\">\n";

        $htmlCode .= "<div class=\"col-sm-7 col-md-5\">\n";
        $htmlCode .= "\t<div class=\"thumbnail\">\n";
        $htmlCode .= "\t\t<img src=\"$musique->coverPath\" alt=\"Album Thumbnail\" width='500px' height='500px'>\n";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "</div>\n";

        $htmlCode .= "<div class=\"col-sm-7 col-md-5\">\n";
        $htmlCode .= "\t<div class=\"caption\">\n";
        $htmlCode .= "\t\t<h2>$musique->titre</h2>\n";
        $htmlCode .= "\t\t<p class=\"spacer\"><span class=\"glyphicon glyphicon-star-empty\"></span> Artist : $musique->artiste</p>\n";
        $htmlCode .= "\t\t<p>Year : $musique->annee</p>\n";
        $htmlCode .= "\t\t<p>\n";
        $htmlCode .= "\t\t\t<form action=\"?action=like\" method=\"post\">\n";
        $htmlCode .= "\t<input type=\"hidden\" name=\"musicID\" value='$musique->idMusique'>";
        $htmlCode .= "\t\t\t\t<button id=\"buttonLike\" type=\"submit\" class=\"btn btn-default\">\n";
        $htmlCode .= "\t\t\t\t\t<span class=\"glyphicon glyphicon-thumbs-up\"></span>\n";
        $htmlCode .= "\t\t\t\t\tLike \n";
        $htmlCode .= "\t\t\t\t\t<span class=\"label label-success\">$musique->avisfav</span>\n";
        $htmlCode .= "\t\t\t\t</button>\n";
        $htmlCode .= "\t\t\t</form>\n";
        $htmlCode .= "\t\t\t<form action=\"?action=dislike\" method=\"post\">\n";
        $htmlCode .= "\t\t\t\t<button id=\"buttonLike\" type=\"submit\" href=\"?action=Dislike\" class=\"btn btn-default\">\n";
        $htmlCode .= "\t\t\t\t\t<span class=\"glyphicon glyphicon-thumbs-down\"></span>\n";
        $htmlCode .= "\t\t\t\t\tDislike \n";
        $htmlCode .= "\t\t\t\t\t<span class=\"label label-danger\">$musique->avisdefav</span>\n";
        $htmlCode .= "\t\t\t\t</button>\n";
        $htmlCode .= "\t\t\t</form>\n";
        $htmlCode .= "\t\t</p>\n";
        $htmlCode .= "<audio controls=\"controls\">Your browser doesn't support the <code>audio</code> element.";
        $htmlCode .= "<source src=\"$musique->musicPath\" type=\"audio/mp3\"></audio><br/><br/>";
        $htmlCode .= "\t\t<span class=\"glyphicon glyphicon-time\"></span> Added on website : $musique->dateMaj\n";
        $htmlCode .= "<p>";
        $htmlCode .= self::getHTML_TitleDetailsControls($_SESSION['role'], $musique->idMusique);
        $htmlCode .= "</p>";

        $htmlCode .= "\t</div>\n";
        $htmlCode .= "</div>\n";

        $htmlCode .= "</div>\n";
        return $htmlCode;
    }

    public static function getHTML_TitleDetailsControls($role, $musicID)
    {
        if ($role != 'admin') {
            return "";
        }
        //$htmlCode = "<div class=\"row\">\n";
        $htmlCode = "\t<div class=\"col-sm-7 col-md-5\">\n";
        $htmlCode .= "<form action=\"?action=deleteTitle\" method=\"post\">";
        $htmlCode .= "\t<input type=\"hidden\" name=\"musicID\" value='$musicID'>";
        $htmlCode .= "\t<button class=\"btn btn-danger btn-lg\" type=\"submit\"><span class=\"glyphicon glyphicon-trash\"></span> Delete this title</button>";
        $htmlCode .= "</form>";
        $htmlCode .= "\t</div>\n";
        //$htmlCode .= "</div>\n";
        return $htmlCode;
    }

    public static function getHTML_Commentaire($commentaires)
    {
        $base = "<form action=\"?action=deleteComment\" method=\"post\">\n";
        $var = $commentaires[0]->idMusique;
        $base .= "<input type=\"hidden\" name=\"musicID\" value=\"$var\">\n";
        $base .= "<button class=\"btn btn-danger\" type=\"submit\"><span class=\"glyphicon glyphicon-trash\"></span></button>";

        $htmlCode = "<div class=\"row\">\n";
        $htmlCode .= "\t<div class=\"col-md-3\">\n";
        $htmlCode .= "\t\t<h1>Comments :</h1>\n";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "\t<div class=\"col-md-4\">\n";
        $htmlCode .= "<form action=\"?action=addComment\" method=\"post\">";
        $htmlCode .= "\t<input type=\"hidden\" name=\"musicID\" value=\"" . $_GET['musicID'] . "\">";
        $htmlCode .= "\t<button class=\"btn btn-lg btn-default\" type=\"submit\"><span class=\"glyphicon glyphicon-plus\"></span> Add a comment</button>";
        $htmlCode .= "</form>";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "</div>\n";


        foreach ($commentaires as $subCom) {
            $actions = "";
            $_user = "\t\t<span class=\"glyphicon glyphicon-user\"></span> By : $subCom->idUser\n";
            $_date = "<span class=\"glyphicon glyphicon-time\"></span> Posted on : $subCom->date\n";
            if ($_SESSION['email'] == $subCom->idUser || $_SESSION['role'] == 'admin') {
                $actions = $base . "<input type=\"hidden\" name=\"dateComment\" value=\"$subCom->date\">\n";
                $actions = $actions . "<input type=\"hidden\" name=\"author\" value=\"$subCom->idUser\">\n</form>";
            }

            $htmlCode .= "<div class=\"panel panel-default\">\n";
            $htmlCode .= "<div class=\"panel-body\">";
            $htmlCode .= "\t\t<p>$subCom->text</p>\n";
            $htmlCode .= "</div>";
            $htmlCode .= "<div class=\"panel-footer\">";
            $htmlCode .= "<div class=\"row\">";
            $htmlCode .= "<div class='col-md-4'>$_user</div>\n<div class='col-md-4'>$_date</div>\n";
            $htmlCode .= "<div class='col-md-4'><div class='pull-right'>$actions</div></div>\n";
            $htmlCode .= "</div>";
            $htmlCode .= "</div>";
            $htmlCode .= "\t</div>\n";
        }

        if (empty($commentaires)) {
            $htmlCode .= "<div class=\"panel panel-default\">\n";
            $htmlCode .= "<div class=\"panel-body\">";
            $htmlCode .= "\t\t<p>There is no comment yet. Be the first to post !</p>\n";
            $htmlCode .= "</div>";
            $htmlCode .= "</div>";
        }

        return $htmlCode;
    }
}

?>
