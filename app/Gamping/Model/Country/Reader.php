<?php
namespace Gamping\Model\Country;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Country\VO';

    public function getSelectQuery() {
        return <<<SQL
SELECT
    country.*,
    translation.name as translation_name
FROM
    country
LEFT JOIN
    translation
    ON translation.id = country.name
    AND translation.language_id = {$this->getDefaultLanguageId()}
SQL;
    }

    public function getTableName() {
        return 'country';
    }
}