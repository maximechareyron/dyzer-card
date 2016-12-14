<?php

namespace controleur;

class CtrlUser {

	function __construct() {

		// Démarrage (ou reprise) de la session
		session_start();


// Début

		// On initialise un tableau d'erreur :
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action) {

				// Pas d'action, on réinitialise 1er appel
				case NULL:
				$this->Reinit();
				break;

				// Mauvaise action
				default:
				$dVueEreur[] =	"Erreur d'appel php";
				require ($rep.$vues['erreur']);
				break;
			}

		} catch (PDOException $e)
		{
	//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
		{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}


	//fin
		exit(0);
	}//fin constructeur


	function Reinit() {
		global $rep,$vues;

		require ($rep.$vues['accueil']);
	}
}

?>