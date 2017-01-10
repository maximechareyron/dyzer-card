# dyzer-card
Site de musique en ligne
----------------------------

Le but du projet est de proposer la gestion d'un site de musique en ligne, en utilisant le patron MVC.
On considère différentes parties: 

* La partie "**accueil**" du site. Sur cette page sont mentionnés les titres actuellement mis en ligne, ordonnés selon le nombre d'avis favorables obtenus (ordre décroissant). Pour chacun de ces titres, on trouvera: 
  * son nom ;
  * la couverture de l'album d'où il est tiré ;
  * la période de mise en ligne ;
  * le nombre d'avis favorables et négatifs obtenus depuis le début de la mise en ligne.
  
  * Le visiteur doit pouvoir :
	  * accéder au détail des informations sur un titre sans possibilité de modification ;
	  * ajouter un commentaire et/ou donner un avis (j'aime, je n'aime pas, indifférent) sur un titre ;
	  * faire afficher les commentaires déjà enregistrés, à la demande. Afin de ne pas surcharger la BDD, seuls les 3 derniers commentaires pour chaque titre seront conservés ;
	  * _écouter un titre (facultatif)_.
    
* La partie "**informations sur un titre**". Elle permet de consulter tout ce qui concerne un titre :
  * Le nom du titre, la durée d'écoute ;
  * Les avis obtenus, la période durant laquelle il ou elle a été mis sur le site, les 3 derniers commentaires postés par les visiteurs ;
  * _Des infos sur l'album, le nom et la couverture de l'album, l'artiste qui l'a fait, l'année de parution... (falcultatif)_.

* La partie "**administrateur**" permet :
  * D'ajouter ou supprimer un titre ;
  * De consulter et modifier tout ce qui concerne un titre ;
  * De modérer les commentaires des utilisateurs ;
  
L'ensemble des données sur les titres, albums, commentaires, doivent être sauvegardées dans une base de données.
Par l'utilisation de session, un administrateur connecté de ne perd pas ses droits en se déplaçant de page en page.
La gestion d'erreurs doit être complète. (champs vérifiés, connection à la BD,...) 
