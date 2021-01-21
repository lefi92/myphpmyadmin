<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 20/12/2017
 * Time: 16:34
 */

$bd->delete_db($_POST['database_delete']);
header('Location:' . $url_base );
die('redirection vers : ' . $url_base);
//var_dump($_POST);