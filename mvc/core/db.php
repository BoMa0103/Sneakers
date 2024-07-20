<?php 

    function dbInstance(){
        static $db ;
        
        if($db === null){
            $db = new PDO('mysql:host=localhost;dbname=civilprojectdb;', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $db->exec('SET NAMES UTF8');
        }

        return $db;

    }

    function dbQuery(string $sql, array $params = []) : PDOStatement {
        $db = dbInstance();
        $query = $db->prepare($sql);
        $query->execute($params);
        return $query;
    }

?>