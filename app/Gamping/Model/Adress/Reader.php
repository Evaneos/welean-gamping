<?php
namespace Gamping\Model\Address;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Address\VO';

    public function getSelectQuery() {
        return "SELECT * FROM address";
    }

    public function getTableName() {
        return 'address';
    }
}