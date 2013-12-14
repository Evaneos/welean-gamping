<?php

namespace Gamping\Model\Parcel\Builder;

use Gamping\Model\Parcel\Manager;
use Berthe\Paginator;
class Form
{
    private $currencyManager;

    private $parcel;

    private $address;

    private $country;

    private $activities = array();

    private $commodities = array();

    public function setCurrencyManager($manager)
    {
        $this->currencyManager = $manager;
    }

    public function setHosting($tent, $description, $campingcar) {
        $this->parcel->allowTents($tent);
        $this->parcel->allowCaravans($tent);
        $this->parcel->allowCampingCars($tent);
    }

    public function setParcel(\Gamping\Model\Parcel\VO $vo)
    {
        $this->parcel = $vo;

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

    public function setRawData($country, $description, $rules, $capacity, $title) {
        $this->parcel->setCountryId($country);
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
        $this->services[] = $id;

        return $this;
    }

    public function saveParcel($parcelManager, $addressManager)
    {
        if (! $addressManager->save($this->address)) {
            throw new \RuntimeException('Unable to save address.');
        }

        $this->parcel->setAddressId($this->address->getId());

        $this->parcel->setCountryId($this->country->getId());

        if (! $parcelManager->save($this->parcel)) {
            throw new \RuntimeException('Unable to save parcel.');
        }

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
            $parcelHasActivityVO->setOnline(true);

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

}