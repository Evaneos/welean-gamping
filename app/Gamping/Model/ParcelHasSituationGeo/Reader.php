<?php
namespace Gamping\Model\ParcelHasSituationGeo;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\ParcelHasSituationGeo\VO';

    public function getSelectQuery() {
        return "SELECT * FROM parcel_has_situation_geo";
    }

    public function getTableName() {
        return 'parcel_has_situation_geo';
    }
}