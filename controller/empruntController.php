<?php

  require "model/empruntManager.php";
  require "model/materielManager.php"; //pour les fonctions qui servent à l'emprunt
  //var_dump(implode(',',getdate()));
  require "service/errorMsg.php";

  class empruntController {


      public function sortMaterielList() {
        if(isset($_POST) && !empty($_POST)) {
        //alors fonction avec requete de tri
          if(getSortedMateriels($_POST['triMaterielsEmprunts'])){
            $materiels =  getSortedMateriels($_POST['triMaterielsEmprunts']);
          }
          else {
            $materiels = NULL;
          }
        }
        else {
          if(getSortedMateriels('nomAZ')){
          $materiels =  getSortedMateriels('nomAZ');
          }
          else {
            $materiels = NULL;
          }
        }
        require "view/empruntsView.php";
        }

    	public function emprunter() {
    	  $idEmprunteur = intval($_SESSION['user'->getIdEmprunteur()]);
    	  if ((isset($_GET['id'->getId()])) && (!empty($_GET['id'->getId()]))) {
  	      $idMateriel = intval($_GET['id'->getIdMateriel()]);
  	      if(addEmprunt($idMateriel, $idEmprunteur)) {
  	        if(updateEtatMateriel( $idMateriel)) {
  	          array_push($_SESSION["codeMsg"/*->getMsg() */], "3"); //ajoute le code msg à la session code
  	          redirectTo("emprunter/list");
  	        }
  	        else {
  	          array_push($_SESSION["codeMsg"], "4");
  	          redirectTo("emprunter/list");
  	        }
  	      }
  	      else {
  	        array_push($_SESSION["codeMsg"], "4");
  	        redirectTo("emprunter/list");
  	      }
  	    }
  	    require "view/empruntView.php";
  	  }

	  //fonction qui affiche tous les emprunts en cours dans la vue
	  public function allEmpruntsList() {
  		$emprunts->getEmprunts();
  		require "view/restituerEmpruntView.php";
  	}

  
    public function myEmpruntsList(){
      if (isset($_POST) && !empty($_POST)) {
        if(getMyEmpruntsTri($_SESSION['user'->getId()],$_POST['tri'])){
          $myEmprunts = getMyEmpruntsTri($_SESSION['user'->getId()],$_POST['tri']);
        }
        else {
          $myEmprunts = NULL;
        }
      } 
      else {
        if(getMyEmpruntsTri($_SESSION['user'->getId()],2)){
          $myEmprunts = getMyEmpruntsTri($_SESSION['user'->getId()],2);
        }
        else {
          $myEmprunts = NULL;
        }
      }
      require "view/listMyEmpruntsView.php";
      }

    public function restituer() {
      updateDateRendu();
      updateEtatMaterielRendu();
      require "view/restituerEmpruntView.php";
      }
  }

?>