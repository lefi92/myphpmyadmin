<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 21/12/2017
 * Time: 16:41
 */

$i = 0;

    if(!empty($_POST['table_name$i'])) var_dump($_POST['table_name$i']);

require_once($rep_vue.'createTable.php');