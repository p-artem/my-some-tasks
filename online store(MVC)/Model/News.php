<?php

class Model_News
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
    public $title;
    public $keywords;
    public $description;
    public $anons;
    public $text;
    public $date;
    
    const countLimit = 20;
    
    public static function getItems($params)
    {

        $dbTableNews = new Model_Db_Table_News();
        $newsData   = $dbTableNews->getByCriteria($params, self::countLimit);

        $newsModels = array();
        
        foreach ($newsData as $item) {
            $newsModel               = new self();
            $newsModel->id           = $item->id;
            $newsModel->title        = $item->title;
            $newsModel->keywords     = $item->keywords;
            $newsModel->description  = $item->description;
            $newsModel->anons        = $item->anons;
            $newsModel->text         = $item->text  ;
            $newsModel->date         = $item->date;
            $newsModels[] = $newsModel;
        }
        
        return $newsModels;
    }
    
    public static function setItem($params)
    {
        $dbTableNews = new Model_Db_Table_News();
        $newsData   = $dbTableNews->setItem($params);
    }

    public function getAll()
    {
        $newsTable = new Model_Db_Table_News();
        $news = $newsTable->getAll();

                
        $newsModels = array();
        foreach ($news as $item) {
            
            $newsModel               = new self();
            $newsModel->id           = $item->id;
            $newsModel->title         = $item->title;
            $newsModel->keywords         = $item->keywords;
            $newsModel->description  = $item->description;
            $newsModel->anons          = $item->anons;
            $newsModel->text        = $item->text  ;
            $newsModel->date        = $item->date;
            $newsModels[] = $newsModel;
        }
                   
        return $newsModels;
    }
        
    public function getNewsLink()
    {
        return '<a href="./info/id/' . $this->id .  '">' . $this->name . '</a>';
    }
    
    /**
     * 
     * @param int $newsId
     * @return Model_News
     * @throws Exception
     */
//    public static function getById($newsId)
//    {
//        $newsTable     =  new Model_Db_Table_News();
//
//        $newsData   =  reset($newsTable->getById($newsId));
//        
//        
//        if($newsData) {
//            
//            $modelNews  = new self();
//            $modelNews->id           = $newsData->id;
//            $modelNews->name         = $newsData->name;
//            $modelNews->description  = $newsData->description;
//            $modelNews->price        = $newsData->price;
//            $modelNews->total        = $newsData->total;
//
//            return $modelNews;
//        }
//        else {
//            throw new Exception('News not found', System_Exception::NOT_FOUND);
//        }
//    }
    
    public static function getCountItems()
    {
        $dbTableNews = new Model_Db_Table_News();
        $countItems     = $dbTableNews->getCount();
        return $countItems; 
    }
    
    public static function addNews($params)
    {
        $dbTableNews = new Model_Db_Table_News();
        $result = $dbTableNews->addNews($params);
        
        return $result;
    }
    
    public static function deleteNews($params)
    {
        
        $dbTableNews = new Model_Db_Table_News();
        $result = $dbTableNews->deleteId($params);
        
        return $result;
    }
}