<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 21/12/2017
 * Time: 21:43
 */

$form_err = array();
if(!empty($_POST['old_nametable'])) {
    $old_nametable = htmlentities($_POST['old_nametable']);
    if (isset($_POST['database_name']) && isset($_POST['table_name'])) {
        $nom_database = htmlentities($_POST['database_name']);
        $nom_table = htmlentities($_POST['table_name']);
        $new_name = $nom_database.'.'.$nom_table;
        if ($old_nametable != $new_name) {
            if ($bd->rename_table($old_nametable, $new_name)) {
                header('Location:' . $url_base . '/?table_name=' . $new_name);
                die('redirection vers : ' . $url_base . '/?table_name=' . $new_name);
            } else
                $form_err['sql_request'] = $bd->getCo()->error;
        }
    }
}
require_once($rep_vue.'RenameTable.php');