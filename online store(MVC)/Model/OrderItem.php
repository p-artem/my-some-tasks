<?php

class Model_OrderItem
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
    public $prodId;
    public $prodName;
    public $prodPrice;
    public $prodQuant;
    
    /**
     * 
     * @param int $orderId
     * @return Model_Order
     * @throws Exception
     */
    
    public static function getById($orderId)
    {
        $orderTable     =  new Model_Db_Table_OrderItem();
        $orderItemData   =  $orderTable->getById($orderId);
        
        $modelOrder = array();
        
        if($orderItemData) {
        foreach ($orderItemData as $item) 
        {
            $modelOrderItem = new self();
            $modelOrderItem->prodId     = $item->id;
            $modelOrderItem->prodName   = $item->name ;
            $modelOrderItem->prodPrice  = $item->price;
            $modelOrderItem->prodQuant  = $item->quantity;
            $modelOrder[] = $modelOrderItem;
        } 
        
         return $modelOrder;
         } 
        else {
            throw new Exception('Order not found', System_Exception::NOT_FOUND);
        }
    }
    
    public static function sumOrderById($orderId)
    {
        $orderTable     =  new Model_Db_Table_OrderItem();
        $orderItemData   =  $orderTable->sumOrderById($orderId);
        
       return $orderItemData;
    }

}