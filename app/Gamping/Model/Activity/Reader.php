<?php
namespace Gamping\Model\Activity;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Activity\VO';

    public function getSelectQuery() {
        return "SELECT * FROM activity";
    }

    public function getTableName() {
        return 'activity';
    }
}