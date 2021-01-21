<?php

if (!empty($key)){
	$bd->deleteRow($table,$key,$id);
}
header('Location:' . $url_base.'?table_name='.$table );
die('redirection vers : ' .$url_base.'?table_name='.$table);




