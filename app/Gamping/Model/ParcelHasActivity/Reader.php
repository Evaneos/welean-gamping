<?php
namespace Gamping\Model\ParcelHasActivity;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\ParcelHasActivity\VO';

    public function getSelectQuery() {
        return "SELECT * FROM parcel_has_activity";
    }

    public function getTableName() {
        return 'parcel_has_activity';
    }
}