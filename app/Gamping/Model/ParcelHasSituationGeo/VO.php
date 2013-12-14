<?php
namespace Gamping\Model\ParcelHasSituationGeo;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $parcel_id = 0;
    protected $situation_geo_id = 0;

    public function setParcelId($value) {
        $this->parcel_id = $value;
        return $this;
    }

    public function getParcelId() {
        return $this->parcel_id;
    }

    public function setSituationGeoId($value) {
        $this->situation_geo_id = $value;
        return $this;
    }

    public function getSituationGeoId() {
        return $this->situation_geo_id;
    }
}