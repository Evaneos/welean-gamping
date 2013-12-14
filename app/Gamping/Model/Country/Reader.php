<?php
namespace Gamping\Model\Country;

class Reader extends \Gamping\DAL\AbstractReader {
    const VO_CLASS = '\Gamping\Model\Country\VO';

    public function getSelectQuery() {
        return <<<SQL
SELECT
    {$this->getTableName()}.*,
    tName.name as translation_name,
    tComputername.name as translation_computername
FROM
    {$this->getTableName()}
LEFT JOIN
    translation as tName
    ON tName.id = {$this->getTableName()}.name
    AND tName.language_id = {$this->getDefaultLanguageId()}
LEFT JOIN
    translation as tComputername
    ON tComputername.id = country.computername
    AND tComputername.language_id = {$this->getDefaultLanguageId()}
SQL;
    }

    public function getTableName() {
        return 'country';
    }

    public function getIdByComputerame($computername)
    {
        $sql = <<<SQL
SELECT
    country.id
FROM
    country
LEFT JOIN
    translation as tComputername
    ON tComputername.id = country.computername
    AND tComputername.language_id = ?
    AND tComputername.name = ?
SQL;
        return $this->db->fetchOne($sql, array($this->getDefaultLanguageId(), $computername));
    }

    public function getIdsWithActiveParcel()
    {
        $sql = <<<SQL
SELECT
  DISTINCT country_id as id
FROM
  parcel
SQL;
        return $this->db->fetchCol($sql);
    }


}