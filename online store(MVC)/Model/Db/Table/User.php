<?
class Model_Db_Table_User extends System_Db_Table
{
    protected $_name = 'user';
    
    /**
     * @param array $params
     * @return int 
    */
    public function create($params)
    {
        $logName  = trim($params['login']);
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        $sth = $this->_connection->prepare('INSERT INTO ' . $this->_name . ' (email,password,login) VALUES(?,?,?)');
        
        $result = $sth->execute(array($login, sha1($password), $logName));

        if(!empty($result)) {
            return $this->_connection->lastInsertId();
        }
    }
    
    public function checkIfExists($params, $mode = Model_User::MODE_REGISTER)
    {
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        
        $requestParams = array($login);
        
        $sql = 'select * from ' . $this->_name . ' where email = ?';
        if($mode == Model_User::MODE_LOGIN) {
            $sql .= 'AND password = ?';
            array_push($requestParams, sha1($password));
        }
        
        /**
         * @var PDOStatement $sth 
         */
        $sth = $this->_connection->prepare($sql);
        $sth->execute($requestParams);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);        
                
        return $result;
    }
    
    public function updateUserById($params)
    {      
        $sql = 'update ' . $this->_name . ' SET login = :login, email = :email, password = :password, firstname = :firstName, '
                                        . ' surename = :sureName, lastname = :lastName, phone = :phone, address = :address, role_id  = :role_id where id = :id';
           
        try {       
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $sth    = $this->_connection->prepare($sql);
        
        $sth->bindValue(':id', $params['id'], PDO::PARAM_INT);
        $sth->bindValue(':login', $params['login'], PDO::PARAM_STR);
        $sth->bindValue(':email', $params['email'], PDO::PARAM_STR);
        $sth->bindValue(':firstName', $params['firstName'], PDO::PARAM_STR);
        $sth->bindValue(':sureName', $params['sureName'], PDO::PARAM_STR);
        $sth->bindValue(':lastName', $params['lastName'], PDO::PARAM_STR);
        $sth->bindValue(':password', $params['password'], PDO::PARAM_STR);
        $sth->bindValue(':phone', $params['phone'], PDO::PARAM_STR);
        $sth->bindValue(':address', $params['address'], PDO::PARAM_STR);
        $sth->bindValue(':role_id', $params['role_id'], PDO::PARAM_INT); 
        
        $result = $sth->execute();
        
        return $result;
        } catch (PDOException $e) {
            echo 'Запрос не удался: ' . $e->getMessage();
        }
    }
    
    public function addUser($params)
    {        
        if(!empty($params['password']))
           $params['password'] = sha1($params['password']);
        
        $sql = "insert into ".$this->_name." (login, email, password, firstname, role_id) VALUES (:login, :email, :password, :firstName, :role_id)";
        
        try {       
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $sth  = $this->_connection->prepare($sql);
        
        $sth->bindParam(':login', $params['login'], PDO::PARAM_STR);
        $sth->bindParam(':email', $params['email'], PDO::PARAM_STR);
        $sth->bindParam(':password', $params['password'], PDO::PARAM_STR);
        $sth->bindParam(':firstName', $params['firstName'], PDO::PARAM_STR);
        $sth->bindParam(':role_id', $params['role_id'], PDO::PARAM_INT); 
  
        $result = $sth->execute();
        
        return $result;
        } catch (PDOException $e) {
            echo 'Запрос не удался: ' . $e->getMessage();
        }
    }
    
}