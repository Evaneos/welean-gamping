<?php
namespace Gamping\Model\ParcelHasPicture;

class VO extends \Berthe\AbstractVO {
    const VERSION = 1;

    protected $name = "";

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getName() {
        return $this->name;
    }
}