<?php

class Controller_Admin extends System_Controller
{
     public function indexAction()
    {
        $params = $this->_getArguments();
        /**
         * @var Model_Product[] $productModels
         */
        $productModels = Model_Product :: getItems($params);
        $countProducts = Model_Product :: getCountItems();
       
        $limit          = !empty($params['limit']) ? $params['limit'] : 30; 
        $currentPage    = !empty($params['page']) ? $params['page'] : 1; 
        $orderType      = !empty($params['ordertype']) ? $params['ordertype'] : 'asc'; 
        $orderBy        = !empty($params['orderby']) ? $params['orderby'] : 'id'; 
        
        $this->view->setParam('products', $productModels);
        $this->view->setParam('countProducts', $countProducts);
        $this->view->setParam('limit', $limit);
        $this->view->setParam('currentPage', $currentPage);
        $this->view->setParam('orderType', $orderType);
        $this->view->setParam('orderBy', $orderBy);
    }
    
    public function newsAction()
    {
         $params = $this->_getArguments();
        /**
         * @var Model_News[] $newsModels
         */
        $newsModels = Model_News :: getItems($params);
        $countNews = Model_News :: getCountItems();
       
        $limit          = !empty($params['limit']) ? $params['limit'] : 30; 
        $currentPage    = !empty($params['page']) ? $params['page'] : 1; 
        $orderType      = !empty($params['ordertype']) ? $params['ordertype'] : 'asc'; 
        $orderBy        = !empty($params['orderby']) ? $params['orderby'] : 'id'; 
        
        $this->view->setParam('news', $newsModels);
        $this->view->setParam('countNews', $countNews);
        $this->view->setParam('limit', $limit);
        $this->view->setParam('currentPage', $currentPage);
        $this->view->setParam('orderType', $orderType);
        $this->view->setParam('orderBy', $orderBy);
    }
    
    public function addNewsAction()
    {
        
    }
    
    public function addNewsFuncAction()
    {
        $params = $this->getAllParams();
        
        try{
            $addNewsModel = Model_News :: addNews($params);
            
        echo json_encode($addNewsModel);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
    public function editNewsAction()
    {
        $args = $this->_getArguments();
        $newsId = $args['id'];
    }
    
    public function addNewsItemAction()
    {
         $params = $this->_getArguments();

         $newsModels = Model_News :: setItem($params);
         //$this->view->setParam('addNews', $addNews);
    }
    
    public function deleteNewsAction()
    {        
        $params  = $this->getAllParams();
        
        try{
        $deleteNews = Model_News :: deleteNews($params);
        
        echo json_encode($deleteNews);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
     public function updateAllNewsAction()
    {
        try{
        $updateAllNews = Model_News::getAll();
        
        echo json_encode($updateAllNews);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }


    public function ordersAction()
    {
        
        $ordersModels = Model_Order :: getAll();
        $countOrders = Model_Order :: getCountItems();
       
        $limit          = !empty($params['limit']) ? $params['limit'] : 30; 
        $currentPage    = !empty($params['page']) ? $params['page'] : 1; 
        $orderType      = !empty($params['ordertype']) ? $params['ordertype'] : 'asc'; 
        $orderBy        = !empty($params['orderby']) ? $params['orderby'] : 'id'; 
        
        $this->view->setParam('orders', $ordersModels);
        $this->view->setParam('countOrders', $countOrders);
        $this->view->setParam('limit', $limit);
        $this->view->setParam('currentPage', $currentPage);
        $this->view->setParam('orderType', $orderType);
        $this->view->setParam('orderBy', $orderBy);
    }
    
    public function infoOrderAction()
    {
        $args = $this->_getArguments();
        $orderId = $args['id'];
        
        
        try {
            $modelOrder = Model_OrderItem :: getById($orderId);
            $summaOrderbyId =  Model_OrderItem :: sumOrderById($orderId);
            
           $this->view->setParam('order', $modelOrder);
           $this->view->setParam('summaOrder', $summaOrderbyId);
            
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }


    public function usersAction()
    {
        $usersModels = Model_User :: getAll();
        $countUsers = Model_User :: getCountItems();
       
        $limit          = !empty($params['limit']) ? $params['limit'] : 30; 
        $currentPage    = !empty($params['page']) ? $params['page'] : 1; 
        $orderType      = !empty($params['ordertype']) ? $params['ordertype'] : 'asc'; 
        $orderBy        = !empty($params['orderby']) ? $params['orderby'] : 'id'; 
        
        $this->view->setParam('users', $usersModels);
        $this->view->setParam('countUsers', $countUsers);
        $this->view->setParam('limit', $limit);
        $this->view->setParam('currentPage', $currentPage);
        $this->view->setParam('orderType', $orderType);
        $this->view->setParam('orderBy', $orderBy);
    }
    
    public function addUserAction()
    {

    }
    
    public function addUserFuncAction()
    {
        $params = $this->getAllParams();
        
        try {
            $modelAddUser = Model_User :: addUser($params);
            $this->addUserAction($modelAddUser);
            
            if($modelAddUser)
            {
                return header('Location: /admin/users');
            }
           
            //$this->view->setParam('addUser', $modelUser);
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }
    
    public function editUserAction()
    {
        $args = $this->_getArguments();
        $userId = $args['id'];

        try {
            $modelEditUser = Model_User :: getById($userId);

            $this->view->setParam('editUser', $modelEditUser);
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }
    
    public function deleteUserAction()
    {
        $params  = $this->getAllParams();
           
        try{
        $deleteUser = Model_User :: deleteUser($params);
        
        echo json_encode($deleteUser);
        die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
    public function updateAllUsersAction()
    {
        try{
        $updateAllUsers = Model_User ::getAll();
        
        echo json_encode($updateAllUsers);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }

        public function updateUserAction()
    {
        $params = $this->getAllParams();
      
        try {
            $modelUpdateUserById = Model_User::updateUserById($params);

        echo json_encode($modelUpdateUserById);
        die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
    
    public function aboutAction()
    {
        
    }
    
    public function portfolioAction()
    {
        
    }
    
    public function updateProdAction()
    {
        $params  = $this->getAllParams();
        
        try{
        $updateProduct = Model_Product :: updateProd($params);
        
        echo json_encode($updateProduct);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
        
    }
    
     public function deleteProdAction()
    {
        $params  = $this->getAllParams();
           
        try{
        $deleteProd = Model_Product::delProd($params);
        
        echo json_encode($deleteProd);
        die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
    public function getAllProductsAction()
    {
        $modelProduct = new Model_Product(); 
        try {
            $products = $modelProduct->getAll();
            
            echo json_encode($products);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
    public function getProductAction()
    {
        $params     = $this->getAllParams();
        $productModel  = new Model_Product();
        
        try {
        $resuldProd =  $productModel->getProduct($params);
        $prodData = array(
                'id'            =>  $resuldProd->id,
                'name'          =>  $resuldProd->name,
                'description'   =>  $resuldProd->description,
                'img'           =>  $resuldProd->img,
                'price'         =>  $resuldProd->price,
                'total'         =>  $resuldProd->total,
            );
 
         echo json_encode($prodData);
            die();
        }
        catch(Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
            die();
        }
    }
    
     public function addProductAction()
    {
        
    }
}
