<?php

namespace Gamping\Service;

use Gamping;
use Gamping\Model\Parcel\Builder\Form;
use Gamping\Model\Currency\Manager;

/**
 *
 * @author thibaud
 *        
 */
class ParcelFormService
{

    /**
     *
     * @var Manager
     */
    private $currencyManager;

    /**
     * 
     * @var \Gamping\Model\Parcel\Manager
     */
    private $parcelManager;

    
    public function setParcelManager($manager)
    {
        $this->parcelManager = $manager;
    }

    
    public function setCurrencyManager($currencyManager)
    {
        $this->currencyManager = $currencyManager;
    }
    

    /**
     *
     * @return \Gamping\Model\Parcel\Builder\Form
     */
    public function getParcelBuilder()
    {
        $builder = new Form();
        
        $builder->setParcel($this->parcelManager->getVoForCreation());
        $builder->setCurrencyManager($this->currencyManager);
        
        return $builder;
    }

    public function saveParcelFromBuilder(Form $builder)
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}