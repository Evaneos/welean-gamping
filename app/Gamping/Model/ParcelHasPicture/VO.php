<?php
namespace Gamping\Model\ParcelHasPicture;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $picture_id = 0;
    protected $parcel_id = 0;

    public function setPictureId($value) {
        $this->picture_id = $value;
        return $this;
    }

    public function getPictureId() {
        return $this->picture_id;
    }

    public function setParcelId($value) {
        $this->parcel_id = $value;
        return $this;
    }

    public function getParcelId() {
        return $this->parcel_id;
    }

}