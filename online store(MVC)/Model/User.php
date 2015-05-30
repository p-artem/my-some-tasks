<?
class Model_User
{
    public  $id;
    public  $login;
    public  $email;
    private $_password;
    public  $firstName;
    public  $sureName;
    public  $lastName;
    public  $phone;
    public  $address;
    public  $photo;
    public  $role_id;

    
    const ROLE_ADMIN_ID = 1;
    const MODE_REGISTER = 1;
    const MODE_LOGIN    = 2;
    
    const LIFETIME_USER_COOKIE = 10800;//3 hours
    
    public function __construct()
    {

    }
    
    public function create($login, $password)
    {
        $dbUser = new Model_Db_Table_User();
        $dbUser->create($login,$password);
    }
    
    
    /**
     * @param int $userId 
     * @return Model_User
     * @return Exeption
    */
    
    public static function getById($userId)
    {
        $dbUser     =  new Model_Db_Table_User();
        $userData   =  array_shift($dbUser->getById($userId));
        
        if($userData) {
            $modelUser  = new self();
            $modelUser->id           = $userData->id;
            $modelUser->login        = $userData->login;
            $modelUser->email        = $userData->email  ;
            $modelUser->firstName    = $userData->firstname ;
            $modelUser->lastName     = $userData->lastname ;
            $modelUser->sureName     = $userData->surename ;
            $modelUser->phone        = $userData->phone ;
            $modelUser->address      = $userData->address ;
            $modelUser->photo        = $userData->photo  ;
            $modelUser->role_id      = $userData->role_id ;
            
            return $modelUser;
        }
        else {
            throw new Exception('User not found', System_Exception::NOT_FOUND);
        }
    }
    
    public function save()
    {
        $tableUser = new Model_Db_Table_User();
        $tableUser->save($this);
    }  
    
    public function setEmail($value)
    {
        $this->email = $value;
    }
    
    /**
     * 
     * @param array $params
     * @throws Exception
     */
    public function register($params)
    {
                
        if(!$this->_validate($params))
        {
            throw new Exception('The entered data is invalid', System_Exception::VALIDATE_ERROR);
        }
        
        $tableUser = new Model_Db_Table_User();
   
        $resIfExists = $tableUser->checkIfExists($params);
        
        if(!empty($resIfExists)) {
            throw new Exception('Such account is already exists.', System_Exception :: ALREADY_EXIST);
        }
        else {
            $resCreate = $tableUser->create($params);

            if(!$resCreate) {
                throw new Exception('Can\'t create new user. Try later.', System_Exception :: ERROR_CREATE_USER);
            }
            return $resCreate;
        }
    }
    
    
    /**
     * 
     * @param array $params
     * @return int userId
     * @throws Exception
     */
    public function login($params)
    {
        if(!$this->_validate($params))
        {
            throw new Exception('The entered data is invalid', System_Exception::VALIDATE_ERROR);
        }
        $tableUser = new Model_Db_Table_User();
        
        $res = $tableUser->checkIfExists($params, Model_User::MODE_LOGIN);
        
        if(!empty($res)) {
            $user = reset($res);
            return $user; 
        }
        else {
            throw new Exception('Invalid user or password.', System_Exception::INVALID_LOGIN);
        }
    }
    
    /**
     * 
     * @param array $params
     * @return boolean
     */
    private function _validate($params)
    {
        //$logName =  !empty($params['login']) ? $params['login'] : '';     
        $login      = !empty($params['email']) ? $params['email'] : '';
        $password   = !empty($params['password']) ? $params['password'] : '';
        
        if(empty($password)) {
            return false;
        }
        
        if(strlen($login > 30)) {
            return false;
        }
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    
    public static function getAll()
    {
        $dbtableUser = new Model_Db_Table_User();
        $users = $dbtableUser->getAll();
                      
        $usersModels = array();
        
        if($users) {
        foreach ($users as $item) {
            
            $userModel               = new self();
            $userModel->id           = $item->id;
            $userModel->login        = $item->login;
            $userModel->email        = $item->email  ;
            $userModel->firstName    = $item->firstname ;
            $userModel->lastName     = $item->lastname ;
            $userModel->sureName     = $item->surename ;
            $userModel->photo        = $item->photo  ;
            $userModel->role_id      = $item->role_id ;
    
            $usersModels[] = $userModel;
            }
        }  
        
        return $usersModels;
    }
    
    public static function getCountItems()
    {
        $dbtableUser = new Model_Db_Table_User();
        $countItems     = $dbtableUser->getCount();
        return $countItems; 
    }
    
    public static function updateUserById($params)
    {
        $userTable = new Model_Db_Table_User();
        $result = $userTable->updateUserById($params);
        
        return $result;
    }
    
    public static function deleteUser($userId)
    {
        $userTable = new Model_Db_Table_User();
        $result = $userTable->deleteId($userId);
        
        return $result;
    }
    
    public static function addUser($params)
    {
        $userTable = new Model_Db_Table_User();
        $result = $userTable->addUser($params);
        
        return $result;
    }
}