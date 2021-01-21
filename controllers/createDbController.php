<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 21/12/2017
 * Time: 12:48
 */
$database_name = "";
$form_err = array();
if (isset($_POST['database_name'])) {
    $database_name = htmlentities($_POST['database_name']);
    if($bd->createDatabase($database_name)) {
        header('Location:' . $url_base . '/?database_name=' . $database_name);
        die('redirection vers : ' . $url_base . '/?database_name=' . $database_name);
    } else
        $form_err['name'] = $bd->getCo()->error;
}
require_once($rep_vue.'Rename_Database.php');