<?php



class Bd
{
    private $co;
    private $adresse;
    private $passwd;
    private $user;

    function __construct()
    {
        $this->adresse = "localhost";
        $this->user = "root";
        $this->passwd = "";
        $this->co = mysqli_connect($this->adresse,$this->user,$this->passwd) or die ("impossible de se co");
        $this->co->set_charset('UTF8');
    }
    public function getCo()
    {
        return $this->co;
    }
    public function createDatabase($name)
    {
        return $this->co->query("CREATE DATABASE $name");
    }
    public function delete_db($name){
        $this->co->query("DROP DATABASE IF EXISTS $name");
    }

    public function sqlRequest($query)
    {
        return  $this->co->query($query);
    }
    public function contentTable($table)
    {
        return $this->co->query("SELECT * FROM $table");
    }
    public function createTable($database,$name,$attribute)
    {
        $attributs = "";
        foreach ($attribute as $att) {
            $attributs .= $att;
        }
        $query = "CREATE TABLE $database.$name (".$attributs.")";
        $this->co->query($query);
    }

    public function showDatabase($query = "show databases")
    {
        $t = $this->co->query($query);
        return $t;
    }

    public function showTables($database)
    {
        $query = "SHOW TABLES in ".$database;
        return $this->co->query($query);
    }
    public function dropColumn($table,$column){
        return ($this->co->query("ALTER TABLE $table
DROP COLUMN $column"));
    }
    public function NbTables($database){
        $query = "SELECT count(*) as 'Tables'
                 FROM information_schema.TABLES
                 WHERE table_schema= \"$database\"
                 GROUP BY table_schema";
        $nb = $this->co->query($query)->fetch_array();
        if($nb[0] == NULL)
            return ('0');
        return $nb[0];
    }
    public function dateCreateDb($database){
        $query = "SELECT create_time
                 FROM information_schema.TABLES
                 WHERE table_schema= \"$database\"
                 GROUP BY table_schema";
        $nb = $this->co->query($query)->fetch_array();
        if($nb[0] == NULL)
            return ('0');
        return $nb[0];
    }
    public function sizeDB($database){
        $query = "SELECT
                  CONCAT( SUM(ROUND( ( (DATA_LENGTH + INDEX_LENGTH - DATA_FREE) / 1024 / 1024),2)), 'Mo' ) AS TailleMo,
                  CONCAT( SUM(ROUND( ( (DATA_LENGTH + INDEX_LENGTH - DATA_FREE) / 1024 ),2)), 'Ko' ) AS TailleKo
                  FROM information_schema.TABLES
                  WHERE table_schema= \"$database\"";
        $nb = $this->co->query($query);
        if($nb == NULL || $this->co->warning_count )
            return ('0');
        return $nb->fetch_array();
    }

    public function countData($table)
    {
        $query = "SELECT COUNT(*) AS total
                  FROM $table";
        $nb = $this->co->query($query)->fetch_array();
        return $nb['total'];
    }

    public function showColumns($table)
    {
        $describe = "";

        $query = "SHOW COLUMNS FROM ".$table;
        if($result =  $this->co->query($query)) {
            $describe = $result->fetch_all();
            return ($describe);
        } else
            return ($describe);

    }

    public	function getArray($table)
    {
        $tmp = array();
        $result = $this->co->query("SELECT * FROM $table");
        if ($result->num_rows != 0)
        {
            $tmp = $result->fetch_all(MYSQLI_ASSOC);
            return($tmp);
        }
        return ($tmp);
    }

    public function getColumns()
    {
        $result = $this->co()->query("DESCRIBE article");
        $describe = $result->fetch_all();
        return($describe);
    }
    public function rename_table($old,$new)
    {
        return ($this->co->query("RENAME TABLE $old TO $new"));
    }
    public function	rename_bdd($name_old_table, $name_new_table)
    {
        if($t =$this->createDatabase($name_new_table)) {
            $tables = $this->showTables($name_old_table);
            if ($tables->num_rows != 0) {
                while ($row = $tables->fetch_array()) {
                    $this->co->query("RENAME TABLE $name_old_table.$row[0] TO $name_new_table.$row[0]");
                }
            }
            $this->delete_db($name_old_table);
            return('ok');
        }
        else
            return ($t);
    }
    public function getPkey($table)
    {
        $p_key = null;
        foreach ($this->showColumns($table) as $elem)
        {
            if($elem[3] == "PRI")
                $p_key = $elem[0];
        }
        return($p_key);
    }

    public function deleteRow($table,$p_key, $id)
    {
        $query = "DELETE FROM ".$table." WHERE ".$p_key." = ".$id."";
        $this->co->query($query);
    }

    public function selecRow($table,$p_key,$id)
    {
        $tmp = array();
        $result = $this->co->query("SELECT * FROM ".$table." WHERE ".$p_key." = ".$id."");
        if ($result->num_rows != 0)
        {
            $tmp = $result->fetch_all(MYSQLI_ASSOC);
            return($tmp);
        }
        return ($tmp);
    }

    public function describeTable($table)
    {
        $tmp = array();
        $result = $this->co->query("describe ".$table."");
        if ($result->num_rows != 0)
        {
            $tmp = $result->fetch_all(MYSQLI_ASSOC);
            return($tmp);
        }
        return ($tmp);
    }
}