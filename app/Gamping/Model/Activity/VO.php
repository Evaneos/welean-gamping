<?php
namespace Gamping\Model\Activity;

class VO extends \Berthe\AbstractVO
{

    const VERSION = 1;
    
    protected $address_id = 0;
    
    protected $place_id = 0;

    protected $name = "";

    protected $description = "";

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
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
    
    public function getPlaceId()
    {
        return $this->place_id;
    }
    
    public function setPlaceId($id)
    {
        $this->place_id = (int) $id;
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
}