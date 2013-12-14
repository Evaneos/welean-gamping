<?php
namespace Gamping\Model\Commodity;

class VO extends \Gamping\AbstractVO
{

    const VERSION = 1;

    protected $name = "";

    protected $description = "";

    protected $is_available = false;

    public function getName($label = true, $lang = null) {
        return $label ? $this->getTranslation('name', $lang) : $this->name;
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

    public function isAvailable()
    {
        return $this->is_available;
    }

    public function setAvailibility($available)
    {
        $this->is_available = $available;
    }
}