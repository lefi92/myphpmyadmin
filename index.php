<?php
session_start();

require_once("models/Bd.php");
$bd = new Bd();
$rep_vue = 'views/';
$rep_controller = 'controllers/';
$url_base = 'http://localhost/myphpmyadmin';
$page_cible = 'accueil';
$database = $bd->showDatabase();
//mysqli_close($bd->getCo());
$sql_request = '';


if(isset($_GET['edit_data_row']))
{
    if (!isset($_GET['id']) || !isset($_GET['table']) || !isset($_GET['key']) ) {
        $page_cible = 'accueil';
    }
    else
    {
        $page_cible = 'edit_data_row';
        $id = htmlentities($_GET['id']);
        $table = htmlentities($_GET['table']);
        $key = htmlentities($_GET['key']);
    }
}

if(isset($_GET['delete_data_row']))
{
    if (!isset($_GET['id']) || !isset($_GET['table']) || !isset($_GET['key']) ) {
        $page_cible = 'accueil';
    }
    else
    {
        $page_cible = 'delete_data_row';
        $id = htmlentities($_GET['id']);
        $table = htmlentities($_GET['table']);
        $key = htmlentities($_GET['key']);
    }
}
if(isset($_GET['add_table']))
{
    $database_name = htmlentities($_GET['add_table']);
    if($bd->showTables($database_name))
        $page_cible = 'add_table';
    else
        $page_cible = 'accueil';
}
if(isset($_GET['database_name']))
{
    $database_name = htmlentities($_GET['database_name']);
    if($bd->showTables($database_name)) {
        $page_cible = 'show_table';
    }
    else
        $page_cible = 'accueil';
}
if(isset($_GET['rename_database']))
{
    $database_name = htmlentities($_GET['rename_database']);
    if($bd->showTables($database_name)) {
        $page_cible = 'rename_db';
    }
    else
        $page_cible = 'accueil';

}
if(isset($_GET['rename_table']))
{
    $table_name = htmlentities($_GET['rename_table']);
    if($bd->contentTable($table_name)) {
        $page_cible = 'rename_table';
        $data = explode(".", $table_name);
        $nom_database = $data[0];
        $nom_table = $data[1];

    }
    else
        $page_cible = 'accueil';

}
if(isset($_GET['create_database'])) {
    $page_cible = 'create_database';
}

if(isset($_GET['del_data']))
{
    $page_cible = 'delete_database';
}
if(isset($_GET['table_name']))
{
    $table_name = htmlentities($_GET['table_name']);
    if($bd->showColumns($table_name))
    {
        $page_cible = 'show_table_info';
        $data = explode(".", $table_name);
        $nom_database = $data[0];
        $nom_table = $data[1];
    }
    else
        $page_cible = 'show_table';
}
if (isset($_GET['accueil']))
    $page_cible = 'accueil';
if (isset($_GET['sql']))
    $page_cible = 'sql';

ob_start();
switch ($page_cible){
    case 'accueil':
        require_once($rep_vue.'accueil.php');
        break;
    case 'sql':
        require_once($rep_controller.'sqlController.php');
        break;
    case 'show_table':
        $tables = $bd->showTables($database_name);
        $nb_tables = $bd->NbTables($database_name);
        $date_create = $bd->dateCreateDb($database_name);
        $size_Db = $bd->sizeDb($database_name);
        require_once($rep_vue.'table_database.php');
        break;
    case 'show_table_info':
        $table_data_array = $bd->getArray($table_name);
        $table_data_columns = $bd->showColumns($table_name);
        $nb_data = $bd->countData($table_name);

        $key = $bd->getPkey($table_name);
        $table = $bd->describeTable($table_name);
        require_once($rep_vue.'tableShow.php');
      //  $table_data_array = $bd->getArray($table_name);
        //$table_data_columns = $bd->showColumns($table_name);
        //$nb_data = $bd->countData($table_name);
      // require_once($rep_vue.'tableShow.php');
        break;
    case 'delete_database':
        require_once($rep_controller.'deleteDatabaseController.php');
        break;
    case 'rename_db':
        $action = "rename";
        require_once($rep_controller.'renameDbController.php');
        break;
    case 'rename_table':
        require_once($rep_controller.'renameTableController.php');
        break;
    case 'create_database':
        $action = "create";
        require_once($rep_controller.'createDbController.php');
        break;
    case 'add_table':
        require_once($rep_controller.'addTableController.php');
        break;
    case 'delete_data_row':
        require_once($rep_controller.'deleteRowController.php');
        break;
    case 'edit_data_row':
        $table_data_columns = $bd->showColumns($table);
        $rowdata = $bd->selecRow($table,$key,$id);
       // var_dump($rowdata);
        require_once($rep_controller.'editRowController.php');
        break;
    default:
        require_once($rep_vue.'accueil.php');
}
$html_body = ob_get_clean();
require_once('views/template.php');
