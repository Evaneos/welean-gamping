<?php
namespace Gamping\Model\Country;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    /**
     * @Translatable (azeaezz)
     */
    protected $name = "";

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getName($label = true, $lang = null) {
        return $label ? $this->getTranslation('name', $lang) : $this->name;
    }
}