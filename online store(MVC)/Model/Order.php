<?php

class Model_Order
{
    /**
     * @var int
     * @var string
     * @var string
     * @var string
     * @var double
     * @var int     
     */
    
    public $id;
    public $user_id;
    public $login;
    public $amount;
    public $date;
    
    
    const countLimit = 20;
    
//    public static function getItems($params)
//    {
//
//        $dbTableOrder = new Model_Db_Table_Order();
//        $orderData   = $dbTableOrder->getByCriteria($params, self::countLimit);
//        
//        $orderModels = array();
//        
//        foreach ($orderData as $item) {
//            $orderModel               = new self();
//            $orderModel->id           = $item->id;
//            $orderModel->title         = $item->title;
//            $orderModel->keywords         = $item->keywords;
//            $orderModel->description  = $item->description;
//            $orderModel->anons          = $item->anons;
//            $orderModel->text        = $item->text  ;
//            $orderModel->date        = $item->date;
//            $orderModels[] = $orderModel;
//        }
//        
//        return $orderModels;
//    }
    
    public static function setItem($params)
    {
        $dbTableOrder = new Model_Db_Table_Order();
        $orderData   = $dbTableOrder->setItem($params);
    }

        public function getAll()
    {
        $orderTable = new Model_Db_Table_Order();
        $orders = $orderTable->getAll();
                
        $orderModels = array();
        foreach ($orders as $item) {
            
            $orderModel              = new self();
            $orderModel->id          = $item->id;
            $orderModel->login      = $item->login;
            $orderModel->amount       = $item->amount;
            $orderModel->date        = $item->date;
            $orderModels[] = $orderModel;
        }
             
        return $orderModels;
    }
        
    public function getNewsLink()
    {
        return '<a href="./info/id/' . $this->id .  '">' . $this->name . '</a>';
    }
    
    /**
     * 
     * @param int $orderId
     * @return Model_News
     * @throws Exception
     */
    public static function getById($orderId)
    {
        $orderTable     =  new Model_Db_Table_Order();

        $orderData   =  reset($orderTable->getById($orderId));
        
        
        if($orderData) {
            
            $modelOrder  = new self();
            $modelOrder->id           = $orderData->id;
            $modelOrder->name         = $orderData->name;
            $modelOrder->description  = $orderData->description;
            $modelOrder->price        = $orderData->price;
            $modelOrder->total        = $orderData->total;

            return $modelOrder;
        }
        else {
            throw new Exception('News not found', System_Exception::NOT_FOUND);
        }
    }
    
    public static function getCountItems()
    {
        $dbTableOrder = new Model_Db_Table_Order();
        $countItems     = $dbTableOrder->getCount();
        return $countItems; 
    }
}