<?php

namespace DyzerCard\Auth;

// source : Cours de R. Malgouyres, Code Source 7.9
use DyzerCard\Config\Sanitize;
use DyzerCard\Config\Validation;
use DyzerCard\Metier\Music;

/** @brief Validation des données de login/password reçues via $_REQUEST.
 * Nettoyage de toutes les chaînes.
 * Initialisation à vide des inputs inexistants */
class ValidationRequest
{
    /** @brief Validation et initialisation des données du login/password
     * à partir des données reçues dans le tableau superglobal $_REQUEST.
     */
    public static function validationLogin(&$dataError, &$email, &$password)
    {
        // Test sur la forme des données de login et de mot de passe :
        $wouldBePasswd = $_POST['password'];
        if (empty($wouldBePasswd)) {
            $password = "";
            $dataError['password'] = "Invalid password.";
        } else {
            $password = $wouldBePasswd;
        }

        if (!Validation::validateItem($_POST['email'], "email")) {
            $email = "";
            $dataError['login'] = "Invalid mail adress.";
        } else {
            $email = $_POST["email"];
        }
    }

    /** @brief Valide la saisie d'un titre en lisant dans le tableau $_POST.
     * @param $dataError array Tableau d'erreur à remplir
     * @return bool|Music
     */
    public static function validationTitle(&$albumID)
    {
        global $dataError;
        $title = Sanitize::sanitizeItem($_POST["title"], "string");
        if ($title === false) {
            $dataError['InvalidTitle'] = "The title of the song must be a simple string.";
        }

        $artist = Sanitize::sanitizeItem($_POST["artist"], "string");
        if ($artist === false) {
            $dataError['InvalidArtist'] = "The artist of the song must be a simple string.";
        }

        if (!Validation::validateItem($_POST['year'], "int")) {
            $dataError['InvalidYear'] = "The year must be a number.";
        } else {
            $year = Sanitize::sanitizeItem($_POST['year'], "int");
            if ($year > date(Y)) {
                $dataError['InvalidYear'] = "$year is not valid date. We are still in " . date(Y);
            } else if (strlen($year) != 4) {
                $dataError['InvalidYear'] = "Invalid year format. Must be yyyy.";
            }
        }
        if (!Validation::validateItem($_POST['albumID'], "int")) {
            $dataError['InvalidAlbumID'] = "The albumID is a required field and must be a number";
        } else {
            $albumID = Sanitize::sanitizeItem($_POST['albumID'], "int");
            // Existence de l'album en Base ?
        }

        // VERIFICATION DU FICHIER AUDIO
        // Pour que la copie fonctionne, il faut que apache ait les droits d'écriture sur le répertoire...
        /** Attention, par défaut, php limite la taille d'upload des fichiers à 2M. Cela peut poser
         * problème pour les fichiers audios. Modifier la valeur de upload_max_filesize dans le php.ini pour
         * remédier à ce problème. */

        // Si pas de fichier uploadé ou fichier non reçu :
        $filename = $_FILES['audio']['tmp_name'];
        if (empty($_FILES['audio']) || !is_uploaded_file($filename)) {
            $dataError['InvalidAudioFile'] = "No audio file were found. Please upload one.";
            $dataError['Sizefile'] = "If you did upload an audio file, please check that its size does not exceeds " . ini_get('upload_max_filesize') . ".";
        } // Le fichier a été correctement uploadé
        else {
            // Si le fichier n'a pas la bonne extension chez le client
            $fileformat = end(explode('.', $_FILES['audio']['name']));
            if ($fileformat != "mp3") {
                $dataError['WrongFormat'] = "Invalid file format : Got .$fileformat while .mp3 was expected.";
            }
        }

        if (!empty($dataError)) {
            return false;
        }
        return new Music("", $title, $artist, $year, $albumID, "");
    }
}

?>
