<?php

class Model_Db_Table_News extends System_Db_Table
{
    protected $_name = 'news';
    
   
    
    public function setItem($params)
    { 
       
        //$sql    = 'insert into ' . $this->_name . '( ) values ( )';
    }
    
    public function addNews($params)
    {
        
        $sql = "insert into ".$this->_name." (title, keywords, description, anons, text, date) VALUES (:title, :keywords, :description, :anons, :text, :date)";
        
        try {       
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $sth  = $this->_connection->prepare($sql);
        
        $sth->bindParam(':title', $params['title'], PDO::PARAM_STR);
        $sth->bindParam(':keywords', $params['keywords'], PDO::PARAM_STR);
        $sth->bindParam(':description', $params['description'], PDO::PARAM_STR);
        $sth->bindParam(':anons', $params['anons'], PDO::PARAM_STR);
        $sth->bindParam(':text', $params['text'], PDO::PARAM_STR); 
        $sth->bindParam(':date', $params['date'], PDO::PARAM_STR); 
  
        $result = $sth->execute();
          
        return $result;
        } catch (PDOException $e) {
            echo 'Запрос не удался: ' . $e->getMessage();
        }
    }
  
    
}