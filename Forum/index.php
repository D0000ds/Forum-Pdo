<?php 
namespace App;

define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__).DS);
define('VIEW_DIR', BASE_DIR."view/");
define('PUBLIC_DIR', "/public");
define('DEFAULT_CTRL', 'Home');

require("app/Autoloader.php");

Autoloader::register();

session_start();

use App\Session as Session;

//---------REQUETE HTTP INTERCEPTEE-----------
$ctrlname = DEFAULT_CTRL;//on prend le controller par défaut
//ex : index.php?ctrl=home
if(isset($_GET['ctrl'])){
    $ctrlname = $_GET['ctrl'];
}
//on construit le namespace de la classe Controller à appeller
$ctrlNS = "controller\\".ucfirst($ctrlname)."Controller";
//on vérifie que le namespace pointe vers une classe qui existe
if(!class_exists($ctrlNS)){
    //si c'est pas le cas, on choisit le namespace du controller par défaut
    $ctrlNS = "controller\\".DEFAULT_CTRL."Controller";
}
$ctrl = new $ctrlNS();

$action = "index";//action par défaut de n'importe quel contrôleur
//si l'action est présente dans l'url ET que la méthode correspondante existe dans le ctrl
if(isset($_GET['action']) && method_exists($ctrl, $_GET['action'])){
    //la méthode à appeller sera celle de l'url
    $action = $_GET['action'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else $id = null;
//ex : HomeController->users(null)
$result = $ctrl->$action($id);

/*--------CHARGEMENT PAGE--------*/

if($action == "ajax"){//si l'action était ajax
    echo $result;//on affiche directement le return du contrôleur (càd la réponse HTTP sera uniquement celle-ci)
}
else{
    ob_start();//démarre un buffer (tampon de sortie)
    /*la vue s'insère dans le buffer qui devra être vidé au milieu du layout*/
    include($result['view']);
    /*je mets cet affichage dans une variable*/
    $content = ob_get_contents();
    /*j'efface le tampon*/
    ob_end_clean();
    /*j'affiche le template principal (layout)*/
    include VIEW_DIR."template.php";
}