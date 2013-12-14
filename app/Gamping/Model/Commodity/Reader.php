<?php
namespace Gamping\Model\Commodity;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Commodity\VO';

    public function getSelectQuery() {
        return <<<SQL
SELECT
    commodity.*,
    translation.name as translation_name
FROM
    commodity
LEFT JOIN
    translation
    ON translation.id = commodity.name
    AND translation.language_id = {$this->getDefaultLanguageId()}
SQL;
    }

    public function getTableName() {
        return 'commodity';
    }
}