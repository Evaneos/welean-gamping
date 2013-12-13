<?php
namespace Gamping\Translation;

class StringDatabaseEngine extends \Translation_Storage_Abstract implements \Translation_Storage_Interface {
    protected $db = null;

    /**
     * @param \Berthe\DAL\DbWriter $db
     */
    public function setDbAdapter(\Berthe\DAL\DbWriter $db) {
        $this->db = $db;
        return $this;
    }

    /**
     * @param string $key
     * @param string $lang
     * @return string
     */
    protected function makeKey($key) {
        return md5($key);
    }

    public function get($key, $lang) {
        $dbKey = $this->makeKey($key);
        $sql = <<<SQL
SELECT
    val
FROM
    translation_engine
WHERE
    md5key = ?
    AND lang = ?
SQL;
        $value = $this->db->fetchOne($sql, array($dbKey, $lang));
        if ($value) {
            return $value;
        }
        else {
            return false;
        }
    }

    public function getAll() {
        $sql = <<<SQL
SELECT
    md5key,
    lang,
    k,
    val
FROM
    translation_engine
ORDER BY
    md5key ASC,
    lang ASC
SQL;

        $resultSet = $this->db->fetchAll($sql);

        $output = array();
        foreach($resultSet as $row) {
            if (!array_key_exists($row['k'], $output)) {
                $output[$row['k']] = array();
            }

            $output[$row['k']][$row['lang']] = $row['val'];
        }

        return $output;
    }

    public function set($key, $lang, $value) {
        try {
            $dbKey = $this->makeKey($key);
            $delete = <<<SQL
DELETE FROM
    translation_engine
WHERE
    md5key = ?
    AND lang = ?
SQL;
            $this->db->query($delete, array($dbKey, $lang));
        }
        catch(Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }

        try {
            $insert = <<<SQL
INSERT INTO
    translation_engine
    (md5key, lang, k, val)
VALUES
    (?, ?, ?, ?)
SQL;
            $this->db->query($insert, array($dbKey, $lang, $key, $value));
        }
        catch(Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function deleteKeys ($keys){
        $key_str = implode(', ', $keys);

        $sql = <<<SQL
DELETE FROM
    translation_engine
WHERE
    k
IN
    ($key_str)
SQL;

        try {
            $this->db->query($sql);
        }
        catch(Exception $e) {
            throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
        }

        return true;
    }

    public function invert($value, $lang) {
        $sql = <<<SQL
SELECT
    key
FROM
    translation_engine
WHERE
    val = ?
    AND lang = ?
SQL;
        $key = $this->db->fetchOne($sql, array($value, $lang));
        if ($key) {
            return $key;
        }
        else {
            return false;
        }
    }
}