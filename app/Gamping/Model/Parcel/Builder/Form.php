<?php

namespace Gamping\Model\Parcel\Builder;

use Gamping\Model\Parcel\Manager;
use Berthe\Paginator;
use Berthe\ErrorHandler\Errors as ErrorsException;

class Form
{
    private $currencyManager;

    private $parcel;

    private $address;

    private $country;

    private $user;

    private $activities = array();

    private $commodities = array();

    public function setCurrencyManager($manager)
    {
        $this->currencyManager = $manager;
    }

    public function setHosting($tent, $description, $campingcar) {
        $this->parcel->allowTents($tent);
        $this->parcel->allowCaravans($description);
        $this->parcel->allowCampingCars($campingcar);
    }

    public function setParcel(\Gamping\Model\Parcel\VO $vo)
    {
        $this->parcel = $vo;

        return $this;
    }

    public function setUser(\Gamping\Model\User\VO $vo)
    {
        $this->user = $vo;

        return $this;
    }

    public function setAddress(\Gamping\Model\Address\VO $vo)
    {
        $this->address = $vo;

        return $this;
    }

    public function setCountry(\Gamping\Model\Country\VO $vo)
    {
        $this->country = $vo;

        return $this;
    }

    public function getParcel()
    {
        return $this->parcel;
    }

    public function setAcceptedHousings($tentsAllowed, $campingCarsAllowed, $caravansAllowed)
    {
        $this->parcel->allowTents((bool) $tentsAllowed);
        $this->parcel->allowCampingCars((bool) $campingCarsAllowed);
        $this->parcel->allowCaravans((bool) $caravansAllowed);

        return $this;
    }

    public function setUserId($id)
    {
        $this->parcel->setUserId($id);

        return $this;
    }

    public function setCapacity($count)
    {
        $this->parcel->setCapacity((int) $count);

        return $this;
    }

    public function setAddressInformation($address, $locality, $zipCode, $city)
    {
        $this->address->setAddress($address);
        $this->address->setLocality($locality);
        $this->address->setZipCode($zipCode);
        $this->address->setCity($city);
    }

    public function setUserInformation($firstname, $lastname, $email, $password)
    {
        $this->user->setFirstname($firstname);
        $this->user->setLastname($lastname);
        $this->user->setEmail($email);
        $this->user->setPassword(md5($password));
    }

    public function setLatLng() {
        $address = implode(' ', array(
            $this->address->getAddress(),
            $this->address->getZipCode(),
            $this->address->getCity()
        ));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($address));
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $ret = json_decode(curl_exec($curl));

        if ($ret->status === 'OK' && count($ret->results) > 0) {
            $this->parcel->setLatitude($ret->results[0]->geometry->location->lat);
            $this->parcel->setLongitude($ret->results[0]->geometry->location->lng);
        }

    }

    public function setRates($currencyId, $adultPrice, $extraAdultPrice)
    {
        $currency = $this->currencyManager->getById($currencyId);

        if ($currency === null) {
            throw new \RuntimeException(sprintf('Invalid currency code [%s].', $currencyId));
        }

        $this->parcel->setCurrencyId($currency->getId());
        $this->parcel->setPricePerAdult((float) $adultPrice);
        $this->parcel->setPricePerExtraAdult((float) $extraAdultPrice);

        return $this;
    }

    public function setDescription($description)
    {
        $this->parcel->description = $description;

        return $this;
    }

    public function setRules($rules)
    {
        $this->parcel->rules = $rules;

        return $this;
    }

    public function setRawData($description, $rules, $capacity, $title) {
        $this->parcel->setDescription($description);
        $this->parcel->setRules($rules);
        $this->parcel->setTitle($title);
        $this->parcel->setCapacity($capacity);
        $this->parcel->setCreatedAt(new \DateTime());
        $this->parcel->setUpdatedAt(new \DateTime());
    }

    public function addActivity($id)
    {
        $this->activities[] = $id;

        return $this;
    }

    public function addCommodity($id)
    {
        $this->commodities[] = $id;

        return $this;
    }

    public function saveParcel($parcelManager, $addressManager)
    {
        $addressErrors = array();
        $parcelErrors = array();
        try {
            $addressManager->save($this->address);
        }
        catch (ErrorsException $e) {
            $addressErrors = $e->getErrors();
        }

        if ($this->address) {
            $this->parcel->setAddressId($this->address->getId());
        }

        if ($this->country) {
            $this->parcel->setCountryId($this->country->getId());
        }

        if ($this->user) {
            $this->parcel->setUserId($this->user->getId());
        }

        try {
            $parcelManager->save($this->parcel);
        }
        catch (ErrorsException $e) {
            $parcelErrors = $e->getErrors();
        }

        $errors = array_merge($addressErrors, $parcelErrors);
        if (count($errors) > 0) {
            $e = new ErrorsException();
            foreach($errors as $error) {
                $e->addError($error);
            }
            $e->throwMe();
        }


        return $this->parcel;
    }

    public function saveActivities($activityManager, $parcelHasActivityManager)
    {
        $activities = $activityManager->getByIds($this->activities);

        if (count($activities) != count($this->activities)) {
            throw new \RuntimeException('Invalid activities.');
        }

        foreach ($activities as $activity) {
            $parcelHasActivityVO = $parcelHasActivityManager->getVoForCreation();

            $parcelHasActivityVO->setActivityId($activity->getId());
            $parcelHasActivityVO->setParcelId($this->parcel->getId());

            if (! $parcelHasActivityManager->save($parcelHasActivityVO)) {
                throw new \RuntimeException(sprintf('Could not save relationship between parcel [%d] and activity [%d].',
                     $parcelHasActivityVO->getParcelId(), $parcelHasActivityVO->getActivityId()));
            }
        }
    }

    public function saveCommodities($commodityManager, $parcelHasCommodityManager)
    {
        $commodities = $commodityManager->getByIds($this->commodities);

        if (count($commodities) != count($this->commodities)) {
            throw new \RuntimeException('Invalid commodities');
        }

        foreach ($commodities as $commodity) {
            $parcelHasCommodityVO = $parcelHasCommodityManager->getVoForCreation();

            $parcelHasCommodityVO->setCommodityId($commodity->getId());
            $parcelHasCommodityVO->setParcelId($this->parcel->getId());

            if (! $parcelHasCommodityManager->save($parcelHasCommodityVO)) {
                throw new \RuntimeException('Could not save relationship between parcel [%d] and commodity [%d].',
                    $parcelHasCommodityVO->getParcelId(), $parcelHasCommodityVO->getCommodityId());
            }
        }
    }

    public function saveUser($userManager) {
        if (!$userManager->save($this->user)) {
            throw new \RuntimeException('Could not save the user');
        }

        return $this->user;
    }

}