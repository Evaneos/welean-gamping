<?php
namespace Gamping\Model\Country;

class Writer extends \Gamping\DAL\AbstractWriter {
    public function update(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    country
SET
    name = ?,
    computername = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getName(), $object->getComputername(), $object->getId()));
    }

    public function insert(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    country
    (name,computername)
VALUES
    (?,?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getName(), $object->getComputername()));
        $id = (int)$this->db->lastInsertId("country","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Gamping\AbstractVO $object) {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    country
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}