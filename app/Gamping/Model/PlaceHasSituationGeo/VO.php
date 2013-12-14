<?php
namespace Gamping\Model\PlaceHasSituationGeo;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $place_id = 0;
    protected $situation_geo_id = 0;

    public function setPlaceId($value) {
        $this->place_id = $value;
        return $this;
    }

    public function getPlaceId() {
        return $this->place_id;
    }

    public function setSituationGeoId($value) {
        $this->situation_geo_id = $value;
        return $this;
    }

    public function getSituationGeoId() {
        return $this->situation_geo_id;
    }
}