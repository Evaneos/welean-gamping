<?php
namespace Gamping\Model\Parcel;

class VO extends \Gamping\AbstractVO
{

    const VERSION = 1;

    protected $user_id = 0;

    protected $country_id = 0;

    protected $place_id = 0;

    protected $region_id = 0;

    protected $address_id = 0;

    protected $title = '';

    protected $description = '';

    protected $price_per_adult = '';

    protected $price_per_extra = '';

    protected $currency_iso3 = '';

    protected $hosts_tents = false;

    protected $hosts_caravans = false;

    protected $hosts_camping_cars = false;

    protected $capacity = 0;

    protected $latitude = 0;

    protected $longitude = 0;

    /**
     * Policy applied by the host (no walking around naked...)
     *
     * @var string
     */
    protected $rules = '';

    protected $online = false;

    protected $created_at = null;

    protected $updated_at = null;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($id)
    {
        $this->user_id = (int) $id;
        return $this;
    }

    public function getCountryId()
    {
        return $this->country_id;
    }

    public function setCountryId($id)
    {
        $this->country_id = (int) $id;
        return $this;
    }

    public function getPlaceId()
    {
        return $this->place_id;
    }

    public function setPlaceId($id)
    {
        $this->place_id = (int) $id;
        return $this;
    }

    public function getRegionId()
    {
    	return $this->region_id;
    }

    public function setRegionId($id)
    {
        $this->region_id = (int) $id;
        return $this;
    }

    public function getAddressId()
    {
        return $this->address_id;
    }

    public function setAddressId($id)
    {
        $this->address_id = (int) $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPricePerAdult()
    {
        return $this->price_per_adult;
    }

    public function setPricePerAdult($price)
    {
        $this->price_per_adult = (float) $price;
        return $this;
    }

    public function getPricePerExtraAdult()
    {
        return $this->price_per_extra;
    }

    public function setPricePerExtraAdult($price)
    {
        $this->price_per_extra = (float) $price;
        return $this;
    }

    public function getCurrencyCode()
    {
        return $this->currency_iso3;
    }

    public function setCurrencyCode($code)
    {
        $this->currency_iso3 = $code;
        return $this;
    }

    public function hasTents()
    {
        return $this->hosts_tents;
    }

    public function allowTents($allowed)
    {
        $this->hosts_tents = (bool) $allowed;
        return $this;
    }

    public function hasCaravans()
    {
        return $this->hosts_caravans;
    }

    public function allowCaravans($allowed)
    {
        $this->hosts_caravans = (bool) $allowed;
        return $this;
    }

    public function hasCampingCars()
    {
        return $this->hosts_camping_cars;
    }

    public function allowCampingCars($allowed)
    {
        $this->hosts_camping_cars = (bool) $allowed;
        return $this;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = (int) $capacity;
        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
        return $this->rules;
    }

    public function isOnline()
    {
        return $this->online;
    }

    public function setOnline($online)
    {
        $this->online = (bool) $online;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $time)
    {
        $this->created_at = $time;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTime $time)
    {
        $this->updated_at = $time;
        return $this;
    }
}