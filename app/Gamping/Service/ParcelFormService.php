<?php

namespace Gamping\Service;

use Gamping;
use Gamping\Model\Parcel\Builder\Form;
use Gamping\Model\Currency\Manager;
use Berthe\DAL\DbWriter;
use Berthe\ErrorHandler\Errors as ErrorsException;

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

    private $userManager;

    public function __construct(DbWriter $db)
    {
        $this->db = $db;
    }

    public function setUserManager($manager)
    {
        $this->userManager = $manager;
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

    public function getCountryById($id) {
        return $this->countryManager->getById($id);
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
        $builder->setUser($this->userManager->getVoForCreation());
        $builder->setCurrencyManager($this->currencyManager);

        return $builder;
    }

    public function saveParcelFromBuilder($builder)
    {
        $exceptionParcel = null;
        $exceptionActivities = null;
        $exceptionCommodities = null;
        $exceptionUser = null;

        try {
            $this->db->beginTransaction();

            try {
                $user = $builder->saveUser($this->userManager);
            }
            catch(ErrorsException $e) {
                $exceptionUser = $e;
            }

            try {
                $parcel = $builder->saveParcel($this->parcelManager, $this->addressManager);
            }
            catch(ErrorsException $e) {
                $exceptionParcel = $e;
            }

            try {
                $builder->saveActivities($this->activityManager, $this->parcelHasActivityManager);
            }
            catch(ErrorsException $e) {
                $exceptionActivities = $e;
            }

            try {
                $builder->saveCommodities($this->commodityManager, $this->parcelHasCommodityManager);
            }
            catch(ErrorsException $e) {
                $exceptionCommodities = $e;
            }

            if ($exceptionParcel || $exceptionActivities || $exceptionCommodities || $exceptionUser) {
                $error = array_merge(  $exceptionParcel ? $exceptionParcel->getErrors() : array(),
                                        $exceptionActivities ? $exceptionActivities->getErrors() : array(),
                                        $exceptionCommodities ? $exceptionCommodities->getErrors() : array(),
                                        $exceptionUser ? $exceptionUser->getErrors() : array());

                $errors = new ErrorsException();
                foreach($error as $err) {
                    $errors->addError($err);
                }
                $errors->throwMe();
            }

            $this->db->commit();

            return $parcel;
        }
        catch (\Exception $ex) {
            $this->db->rollback();
            throw $ex;
        }
    }
}