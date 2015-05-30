<?php

class Model_Db_Table_OrderItem extends System_Db_Table
{
    protected $_name = 'order_item';
    
    public function getById($orderId)
    {
        
        $sql    = 'select product.id, product.name, product.price, '.$this->_name.'.quantity'
                . ' from '.$this->_name.', product '
                . ' where '.$this->_name.'.product_id = product.id and '.$this->_name.'.order_id = '.$orderId;
        
        $sth    = $this->_connection->prepare($sql);
        $sth->execute();
        
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
          
        return $result;
    }
    
    public function sumOrderById($orderId)
    {
       $sql    = ' select '.$this->_name.'.order_id, sum(product.price * '.$this->_name.'.quantity) as summa '
               . 'from '.$this->_name.', product '
               . 'where '.$this->_name.'.product_id = product.id group by '.$this->_name.'.order_id '
               . 'having '.$this->_name.'.order_id ='.$orderId;
       
        $sth    = $this->_connection->prepare($sql);
        $sth->execute();
        
        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}