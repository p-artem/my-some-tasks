<?php
class Model_Product
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
    public $name;
    public $description;
    public $img;
    public $price;
    public $total;
    
    const countLimit = 20;
    
    public static function getItems($params)
    {

        $dbTableProduct = new Model_Db_Table_Product();
        $productsData   = $dbTableProduct->getByCriteria($params, self::countLimit);
        
        $productModels = array();
        
        foreach ($productsData as $item) {
            $productModel               = new self();
            $productModel->id           = $item->id;
            $productModel->name         = $item->name;
            $productModel->description  = $item->description;
            $productModel->img          = $item->img;
            $productModel->price        = $item->price;
            $productModel->total        = $item->total;
            $productModels[] = $productModel;
        }
        
        return $productModels;
    }
    
    public function getAll()
    {
        $productTable = new Model_Db_Table_Product();
        $products = $productTable->getAll();
                
        $productModels = array();
        foreach ($products as $item) {
            $productModel = new self();
            $productModel->id = $item->id;
            $productModel->name = $item->name;
            $productModel->description = $item->description;
            $productModel->img = $item->img;
            $productModel->price = $item->price;
            $productModel->total = $item->total;
            $productModels[] = $productModel;
        }
             
        return $productModels;
    }
    
    
    public function getDiscountPrice()
    {
        return $this->price * 0.8;
    }
    
    public function getProductLink()
    {
        return '<a href="./info/id/' . $this->id .  '">' . $this->name . '</a>';
    }
    
    /**
     * 
     * @param int $productId
     * @return Model_Product
     * @throws Exception
     */
    public static function getById($productId)
    {
        $productTable     =  new Model_Db_Table_Product();

        $productData   =  reset($productTable->getById($productId));
        
        
        if($productData) {
            $modelProduct  = new self();
            $modelProduct->id           = $productData->id;
            $modelProduct->name         = $productData->name;
            $modelProduct->description  = $productData->description;
            $modelProduct->price        = $productData->price;
            $modelProduct->total        = $productData->total;

            return $modelProduct;
        }
        else {
            throw new Exception('Product not found', System_Exception::NOT_FOUND);
        }
    }
    
    public static function delProd($params)
    {
        $productTable = new Model_Db_Table_Product();
        $result = $productTable->deleteId($params);
        
        return $result;
    }
    
     public static function updateProd($params)
    {
        $productTable = new Model_Db_Table_Product();
        $result = $productTable->updateProd($params);
        
        if($result)
        {
            $productId = $params['id'];
            $resUpdate = self::getById($productId);
        }
        
        return $resUpdate;
    }
    
     public function getProduct($params)
    {
        $id = $params['id'];
     
        $tableProduct = new Model_Db_Table_Product();
        $productData   =  reset($tableProduct->getById($id));
        
        if($productData) {
            $modelProduct  = new self();
            $modelProduct->id           = $productData->id;
            $modelProduct->name         = $productData->name;
            $modelProduct->description  = $productData->description;
            $modelProduct->price        = $productData->price;
            $modelProduct->total        = $productData->total;
       
            return $modelProduct;
        }
        else {
            throw new Exception('Product not found', System_Exception::NOT_FOUND);
        }
        
    }
    
    public static function getCountItems()
    {
        $dbTableProduct = new Model_Db_Table_Product();
        $countItems     = $dbTableProduct->getCount();
        return $countItems; 
    }
}