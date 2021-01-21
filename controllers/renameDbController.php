<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 21/12/2017
 * Time: 11:33
 */

$form_err = array();

if(!empty($_POST['old_namedb'])) {

    $old_namedb = htmlentities($_POST['old_namedb']);
    if (isset($_POST['database_name'])) {
        $new_name = htmlentities($_POST['database_name']);
    } else
        $new_name = htmlentities($_POST['old_namedb']);
    if($old_namedb != $new_name)
    {
        if ($bd->rename_bdd($old_namedb,$new_name) == 'ok')
        {
            header('Location:' . $url_base . '/?database_name='.$new_name);
            die('redirection vers : ' . $url_base . '/?database_name='.$new_name);
        }
        else
           $form_err['sql_request'] =  $bd->getCo()->error;
    }
}
require_once($rep_vue.'Rename_Database.php');