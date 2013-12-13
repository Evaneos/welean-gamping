<?php
namespace Gamping\Model\PlaceHasSituationGeo;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\PlaceHasSituationGeo\VO';

    public function getSelectQuery() {
        return "SELECT * FROM place_has_situation_geo";
    }

    public function getTableName() {
        return 'place_has_situation_geo';
    }
}