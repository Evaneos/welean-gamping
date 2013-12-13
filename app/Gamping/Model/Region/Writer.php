<?php
namespace Gamping\Model\Region;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    region
SET
    name = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getName(), $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    region
    (name)
VALUES
    (?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getName()));
        $id = (int)$this->db->lastInsertId("region","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
        }
    }

    public function delete(\Berthe\AbstractVO $object) {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    region
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}