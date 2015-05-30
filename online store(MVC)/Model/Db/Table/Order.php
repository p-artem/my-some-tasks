<?php

class Model_Db_Table_Order extends System_Db_Table
{
    protected $_name = '`order`';
    
    public function getAll()
    {
        $sql    = 'select '. $this->_name.'.*, user.login from ' . $this->_name. ',user where '. $this->_name.'.user_id = user.id';
        $sth    = $this->_connection->prepare($sql);
        $sth->execute();
        
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }
    
}

