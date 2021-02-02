<?php
use Config\database\DBconnection;

class DBManage extends DBconnection{
    public function sqlQuery($sql, $param=[], $select=false){
        $prepare = $this->connect()->prepare($sql);
        $data_return = $prepare->execute($param);

        if($select){
            $data_return = $prepare->fetchAll();
        }
        
        return $data_return;
    }
}