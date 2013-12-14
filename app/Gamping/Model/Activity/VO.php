<?php
namespace Gamping\Model\Activity;

class VO extends \Gamping\AbstractVO
{

    const VERSION = 1;

    protected $name = 0;

    protected $description = "";

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
}