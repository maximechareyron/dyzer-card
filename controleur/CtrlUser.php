<?php

namespace controleur;

class CtrlUser {

	function __construct() {

		// On initialise un tableau d'erreur :
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action){

				// Pas d'action, on réinitialise 1er appel
				case NULL:
					$this->Reinit();
					break;

				case 'ajoutCommentaire':
					$this->ajouterCommentaire();
					break;

				case 'avisTitre':
					$this->donnerAvis();
					break;


				// Mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['erreur']);
					break;
			}
		}
		catch (PDOException $e){
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue ! ";
			require ($rep.$vues['erreur']);
		}
		catch (Exception $e2){
			$dVueEreur[] =	"Erreur inattendue ! ";
			require ($rep.$vues['erreur']);
		}
		exit(0);
	}


	function Reinit(){
		global $rep,$vues;

		require ($rep.$vues['accueil']);
	}

	function AjouterCommentaire(){
		
	}
}

?>