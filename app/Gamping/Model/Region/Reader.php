<?php
namespace Gamping\Model\Region;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Region\VO';

    public function getSelectQuery() {
        return "SELECT * FROM region";
    }

    public function getTableName() {
        return 'region';
    }
}