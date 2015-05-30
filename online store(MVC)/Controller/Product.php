<?php

class Controller_Product extends System_Controller
{
      
    public function indexAction()
    {
        $params = $this->_getArguments();
        
        /**
         * @var Model_Product[] $productModels
         */
        $productModels = Model_Product :: getItems($params);       
        $countProducts = Model_Product :: getCountItems();
       
        $limit          = !empty($params['limit']) ? $params['limit'] : 20; 
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
    
    public function infoAction()
    {
        
        $args = $this->_getArguments();
       
        $prodId = $args['id'];
        
        try {
            $modelProduct = Model_Product:: getById($prodId);
             
            $this->view->setParam('product', $modelProduct);
            
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }        
}