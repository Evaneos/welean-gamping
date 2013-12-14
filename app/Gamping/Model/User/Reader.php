<?php
namespace Gamping\Model\User;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\User\VO';

    public function getSelectQuery() {
        return "SELECT * FROM user";
    }

    public function getTableName() {
        return 'user';
    }
}