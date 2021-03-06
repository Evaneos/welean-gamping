<?php
namespace Gamping\Model\SituationGeo;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $name = 0;

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getName($label = true, $lang = null) {
        return $label ? $this->getTranslation('name', $lang) : $this->name;
    }
}