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
        switch($_SESSION['role'])
        {

            case 'admin':
                $htmlCode .= "\t\t<a>\n";
                $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-user\">\n";
                $htmlCode .= "\t\t\t</span> Log as Admin\n";
                $htmlCode .= "\t\t</a>\n";
                break;


            case 'user':
                $htmlCode .= "\t\t<a href=\"?action=logout\">\n";
                $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "\t\t\t</span> Deconnexion\n";
                $htmlCode .= "\t\t</a>\n";
                $htmlCode .= "\t</li>\n";
                $htmlCode .= "\t<li>\n";
                $htmlCode .= "\t\t<a>\n";
                $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "\t\t\t</span> Log as Visitor\n";
                $htmlCode .= "\t\t</a>\n";
                break;


            default:
                $htmlCode .= "\t\t<a id=\"signup\" href=\"?action=register\">";
                $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "\t\t\t</span> Sign up !\n";
                $htmlCode .= "\t\t</a>\n";
                $htmlCode .= "\t</li>\n";
                $htmlCode .= "\t<li>\n";
                $htmlCode .= "\t\t<a id=\"signin\" href=\"?action=login\">\n";
                $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-log-in\">\n";
                $htmlCode .= "\t\t\t</span> Sign in\n";
                $htmlCode .= "\t\t</a>\n";
                break;

        }

        $htmlCode .= "\t</li>\n";
        $htmlCode .= "</ul>\n";


        return $htmlCode;
    }

    public static function getHTML_MusiqueDetail($musique)
    {
        $htmlCode = "\t<div class=\"thumbnail\">\n";
        $htmlCode .= "\t\t<img src=\"$musique->coverPath\" alt=\"...\">\n";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "\t<div class=\"caption\">\n";
        $htmlCode .= "\t\t<h1>$musique->titre</h1>\n";
        $htmlCode .= "\t\t<p class=\"spacer\"><span class=\"glyphicon glyphicon-star-empty\"></span> Artist : $musique->artiste</p>\n";
        $htmlCode .= "\t\t<p>Year : $musique->annee</p>\n";
        $htmlCode .= "\t\t<p>\n";
        $htmlCode .= "\t\t<a id=\"boutonJaime\" href=\"?action=Jaime\" class=\"btn btn-default\" role=\"button\">n";
        $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-thumbs-up\"></span>\n";
        $htmlCode .= "\t\t\tLike\n";
        $htmlCode .= "\t\t\t<span class=\"label label-success\">$musique->avisfav</span>\n";
        $htmlCode .= "\t\t</a>\n";
        $htmlCode .= "\t\t<a id=\"boutonJaimePas\" href=\"?action=JaimePas\" class=\"btn btn-default\" role=\"button\">\n";
        $htmlCode .= "\t\t\t<span class=\"glyphicon glyphicon-thumbs-down\"></span>\n";
        $htmlCode .= "\t\t\tDislike\n";
        $htmlCode .= "\t\t\t<span class=\"label label-danger\">$musique->avisdefav</span>\n";
        $htmlCode .= "\t\t</a>\n";
        $htmlCode .= "\t\t</p>\n";
        $htmlCode .= "\t\t<span class=\"glyphicon glyphicon-time\"></span> Added on website : $musique->dateMaj\n";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "</div>\n";
        $htmlCode .= "</div>\n";

        return $htmlCode;
    }

    public static function getHTML_Commentaire($commentaires)
    {
        $htmlCode = "<div class=\"row\">\n";
        $htmlCode .= "\t<div class=\"col-md-12 spacer\">\n";
        $htmlCode .= "\t\t<h1>Espace Commentaire :</h1>\n";
        $htmlCode .= "\t</div>\n";
        $htmlCode .= "</div>\n";
        $htmlCode .= "<div class=\"row\">\n";
        $cpt = 0;
        foreach($commentaires as $subCom) {
            $htmlCode .= "\t<div class=\"col-md-4 spacer\">\n";
            $htmlCode .= "\t\t<p>mdr jpp tro for</p>\n";
            $htmlCode .= "\t\t<p><span class=\"glyphicon glyphicon-user\"></span> Par : Auteur</p>\n";
            $htmlCode .= "\t</div>\n";

            $cpt++;

            if($cpt==3)
            {
                $htmlCode .= "</div>\n";
                $htmlCode .= "<div class=\"row\">\n";

                $cpt = 0;
            }
        }

        return $htmlCode;
    }
}

?>
