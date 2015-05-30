<?

class Model_Db_Table_Product extends System_Db_Table
{
    protected $_name = 'product';
    
    public function updateProd($params)
    {  
        
        $sql = 'update ' . $this->_name . ' SET name = :name, description = :description, price = :price, total = :total  where id = :id';
        $sth    = $this->_connection->prepare($sql);
        
        $sth->bindValue(':id', $params['id'], PDO::PARAM_INT);
        $sth->bindValue(':name', $params['name'], PDO::PARAM_STR);
        $sth->bindValue(':description', $params['description'], PDO::PARAM_STR);
        $sth->bindValue(':price', $params['price'], PDO::PARAM_INT);
        $sth->bindValue(':total', $params['total'], PDO::PARAM_INT);
        
        $result = $sth->execute();
        
        return $result;
    }
    
}