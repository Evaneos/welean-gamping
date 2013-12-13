<?php
namespace Gamping\Model\Commodity;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Commodity\VO';

    public function getSelectQuery() {
        return "SELECT * FROM commodity";
    }

    public function getTableName() {
        return 'commodity';
    }
}