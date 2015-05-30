<?php

class Controller_Index extends System_Controller
{
    public function indexAction()
    {
        $params = array();
        $params['limit'] = 3;
        $params['ordertype'] = 'asc';
        
        $newsAllModels = Model_News :: getItems($params);
        $this->view->setParam('newsAll', $newsAllModels);
        
        $paramsSlider = array();
        $paramsSlider ['limit'] = 3;
        
        $productSliderModels = Model_Product::getItems($paramsSlider);
        $this->view->setParam('productSlider', $productSliderModels);
        
    }
}
