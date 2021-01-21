<?php
$form_err = array();
$form_success = array();
$sql_request = '';

if (!empty($_POST['sql_request'])) {
    if ((!empty($_POST['sql_request']))) {
        $sql_request = htmlentities($_POST['sql_request']);
    }
   // $bd->getCo()->query($sql_request)
    if ($t = $bd->sqlRequest($sql_request))
        $form_success['sucess'] = $t = $bd->sqlRequest($sql_request);
    else
        $form_err['sql_request'] =  $bd->getCo()->error;
    /*
    header('Location:' . $url_base . '/?sql');
    die('redirection vers : ' . $url_base . '/?sql');*/
}
require($rep_vue.'sql.php');