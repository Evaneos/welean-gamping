<?php
namespace Gamping\Model\SituationGeo;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\SituationGeo\VO';

    public function getSelectQuery() {
        return <<<SQL
SELECT
    {$this->getTableName()}.*,
    translation.name as translation_name
FROM
    {$this->getTableName()}
LEFT JOIN
    translation
    ON translation.id = {$this->getTableName()}.name
    AND translation.language_id = {$this->getDefaultLanguageId()}
SQL;
    }

    public function getTableName() {
        return 'situation_geo';
    }
}