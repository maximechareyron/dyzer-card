<?php

namespace controleur;

class CtrlAdmin {

	function __construct() {

// on d�marre ou reprend la session
		session_start();


//debut

//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action) {

//pas d'action, on r�initialise 1er appel
				case NULL:
					$this->Reinit();
					break;


				case "validationFormulaire":
					$this->ValidationFormulaire();
					break;

//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['vuephp1']);
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

		$dVue = array (
			'nom' => "",
			'age' => 0,
		);
		require ($rep.$vues['vuephp1']);
	}

	function ValidationFormulaire() {
		global $rep,$vues;


//si exception, ca remonte !!!
		$nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
		$age=$_POST['txtAge'];
		\config\Validation::val_form($nom,$age,$dVueEreur);

		$model = new \modeles\Simplemodel();
		$data=$model->get_data();

		$dVue = array (
			'nom' => $nom,
			'age' => $age,
			'data' => $data,
		);
		require ($rep.$vues['vuephp1']);
	}

	function Connexion($login,$mdp)
	{
		if(isset($login) && isset($mdp))
		{
			filter_var($login, FILTER_SANITIZE_STRING);

			filter_var($mdp, FILTER_SANITIZE_STRING);
			$hash=sha1($mdp);

			$connexion = new \DAL\Connection($login, $hash);

			$_SESSION['role']=admin;
			$_SESSION['nom']=$login;

		}
		else
		{
			include \vues\erreur.php;
		}
	}
}//fin class

?>
