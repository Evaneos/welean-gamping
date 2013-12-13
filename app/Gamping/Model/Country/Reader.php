<?php
namespace Gamping\Model\Country;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Country\VO';

    public function getSelectQuery() {
        return "SELECT * FROM country";
    }

    public function getTableName() {
        return 'country';
    }
}