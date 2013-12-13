<?php
namespace Gamping\Model\ParcelHasPicture;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\ParcelHasPicture\VO';

    public function getSelectQuery() {
        return "SELECT * FROM parcel_has_picture";
    }

    public function getTableName() {
        return 'parcel_has_picture';
    }
}