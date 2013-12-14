<?php
namespace Gamping\Model\Parcel;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Parcel\VO';

    public function getSelectQuery() {
        return "SELECT * FROM parcel";
    }

    public function getTableName() {
        return 'parcel';
    }
}