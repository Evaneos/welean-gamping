<?php
namespace Gamping\Model\Address;

class VO extends \Berthe\AbstractVO
{

    const VERSION = 1;
    
    protected $address;
    
    protected $locality;
    
    protected $zipCode;
    
    protected $city;
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setAddress($address)
    {
        $this->address = $address;
        
        return $this;
    }
    
    public function getLocality()
    {
        return $this->locality;
    }
    
    public function setLocality($locality)
    {
        $this->locality = $locality;
        
        return $this;
    }
    
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
    }
}