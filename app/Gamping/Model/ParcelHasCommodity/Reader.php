<?php
namespace Gamping\Model\ParcelHasCommodity;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\ParcelHasCommodity\VO';

    public function getSelectQuery() {
        return "SELECT * FROM parcel_has_commodity";
    }

    public function getTableName() {
        return 'parcel_has_commodity';
    }
}