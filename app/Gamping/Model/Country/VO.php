<?php
namespace Gamping\Model\Country;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $name = 0;
    protected $computername = 0;

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getName($label = true, $lang = null) {
        return $label ? $this->getTranslation('name', $lang) : $this->name;
    }

    public function setComputername($value) {
        $this->computername = $value;
        return $this;
    }

    public function getComputername($label = true, $lang = null) {
        return $label ? $this->getTranslation('computername', $lang) : $this->computername;
    }
}