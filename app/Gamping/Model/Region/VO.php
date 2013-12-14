<?php
namespace Gamping\Model\Region;

class VO extends \Berthe\AbstractVO
{

    const VERSION = 1;

    protected $name = "";

    protected $country_id = 0;

    public function getCountryId()
    {
        return $this->country_id;
    }
    
    public function setCountryId($id)
    {
        $this->country_id = (int) $id;
        
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value)
    {
        $this->name = $value;
    
        return $this;
    }
    
}