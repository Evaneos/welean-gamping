<?php
namespace Gamping\Model\Picture;

class Reader extends \Berthe\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Picture\VO';

    public function getSelectQuery() {
        return "SELECT * FROM picture";
    }

    public function getTableName() {
        return 'picture';
    }
}