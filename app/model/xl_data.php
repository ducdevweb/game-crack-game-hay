<?php

namespace App\model;

use PDO;
use PDOException;

class xl_data extends database
{
    //read data
    function readitem($sql)
    {
        try {
            $result = parent::connection_database()->query($sql);
            $danhsach = $result->fetchAll(PDO::FETCH_ASSOC); 
            return $danhsach;
        } catch (PDOException $e) {
            echo 'Error executing query: ' . $e->getMessage();
            echo 'Query: ' . $sql;
        }
    }

    function execute_item($sql)
    {
        parent::connection_database()->query($sql);
    }
}

?>
