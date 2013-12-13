<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class Form extends Controller
{
    /**
     * 
     * @var ParcelFormService
     */
    private $formService;
    
    public function setFormService($parcelFormService)
    {
        $this->formService = $parcelFormService;
    }

    protected function executeAction()
    {
        $builder = $this->formService->getParcelBuilder();
        
        $this->setRates($builder);
        $this->setCommodities($builder);
        $this->setActivities($builder);
        
    }
    
    private function setRates($builder)
    {
        $currencyCode = $this->getParam('currency', '');
        
        $adultPrice = (float) $this->getParam('adult_price', 0);
        $extraAdultPrice = (float) $this->getParam('extra_adult_price', 0);
        
        $builder->setAdultRates($currencyCode, $adultPrice, $extraAdultPrice);
    }
    
    private function setCommodities($builder)
    {
        $commodities = $this->getParam('commodities', array());
        foreach ($commodities as $commodity) {
            $builder->addCommodity((int) $commodity);
        }
    }
    
    private function setActivities($builder)
    {
        $activities = $this->getParam('activities', array());
        foreach ($activities as $activity) {
            $builder->addActivity((int) $activity);
        }
    }
}