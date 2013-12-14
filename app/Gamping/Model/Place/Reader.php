<?php
namespace Gamping\Model\Place;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Place\VO';

    public function getSelectQuery() {
        return "SELECT * FROM place";
    }

    public function getTableName() {
        return 'place';
    }
}