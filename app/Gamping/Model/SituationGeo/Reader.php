<?php
namespace Gamping\Model\SituationGeo;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\SituationGeo\VO';

    public function getSelectQuery() {
        return "SELECT * FROM situation_geo";
    }

    public function getTableName() {
        return 'situation_geo';
    }
}