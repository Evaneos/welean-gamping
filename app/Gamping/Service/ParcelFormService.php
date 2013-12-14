<?php

namespace Gamping\Service;

use Gamping;
use Gamping\Model\Parcel\Builder\Form;
use Gamping\Model\Currency\Manager;
use Berthe\DAL\DbWriter;

/**
 *
 * @author thibaud
 *        
 */
class ParcelFormService
{
    /**
     * 
     * @var DbWriter
     */
    private $db;
    
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

    private $activityManager;
    
    private $addressManager;
    
    private $parcelHasActivityManager;
    
    private $commodityManager;
    
    private $parcelHasCommodityManager;
    
    public function __construct(DbWriter $db)
    {
        $this->db = $db;
    }

    public function setActivityManager($manager)
    {
        $this->activityManager = $manager;
    }

    public function setAddressManager($manager)
    {
        $this->addressManager = $manager;
    }

    public function setCommodityManager($manager)
    {
        $this->commodityManager = $manager;
    }

    public function setCurrencyManager($currencyManager)
    {
        $this->currencyManager = $currencyManager;
    }
    
    public function setParcelManager($manager)
    {
        $this->parcelManager = $manager;
    }
    
    public function setParcelHasActivityManager($manager)
    {
        $this->parcelHasActivityManager = $manager;
    }
    
    public function setParcelHasCommodityManager($manager)
    {
        $this->parcelHasCommodityManager = $manager;
    }

    
    /**
     *
     * @return \Gamping\Model\Parcel\Builder\Form
     */
    public function getParcelBuilder()
    {
        $builder = new Form();
        
        $builder->setParcel($this->parcelManager->getVoForCreation());
        $builder->setAddress($this->addressManager->getVoForCreation());
        $builder->setCurrencyManager($this->currencyManager);
        
        return $builder;
    }

    public function saveParcelFromBuilder($builder)
    {
        try {
            //$this->db->beginTransaction();
            $builder->saveParcel($this->parcelManager, $this->addressManager);
            $builder->saveActivities($this->activityManager, $this->parcelHasActivityManager);
            //$this->db->commit();
        }
        catch (Exception $ex) {
            //$this->db->rollback();
        }
    }
}