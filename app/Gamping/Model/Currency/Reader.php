<?php
namespace Gamping\Model\Currency;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Currency\VO';

    public function getSelectQuery() {
        return "SELECT * FROM currency";
    }

    public function getTableName() {
        return 'currency';
    }
}