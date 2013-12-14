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

    /**
     * @var \Gamping\Model\Country\Manager
     */
    private $countryManager;

    private $addressManager;

    private $parcelHasActivityManager;

    private $commodityManager;

    private $parcelHasCommodityManager;

    private $situationGeoManager;

    public function __construct(DbWriter $db)
    {
        $this->db = $db;
    }

    public function setCountryManager($manager)
    {
        $this->countryManager = $manager;
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

    public function setSituationGeoManager($manager)
    {
        $this->situationGeoManager = $manager;
    }

    public function getAllCountries() {
        return $this->countryManager->getAll();
    }

    public function getAllActivites() {
        return $this->activityManager->getAll();
    }

    public function getAllCommodities() {
        return $this->commodityManager->getAll();
    }

    public function getAllSituationGeo() {
        return $this->situationGeoManager->getAll();
    }

    public function getAllCurrencies() {
        return $this->currencyManager->getAll();
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
            $this->db->beginTransaction();

            $builder->saveParcel($this->parcelManager, $this->addressManager);
            $builder->saveActivities($this->activityManager, $this->parcelHasActivityManager);

            $this->db->commit();
        }
        catch (Exception $ex) {
            $this->db->rollback();
        }
    }
}