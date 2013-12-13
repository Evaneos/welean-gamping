<?php
namespace Gamping\Model\SituationGeo;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    situation_geo
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
    situation_geo
    (name)
VALUES
    (?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getName()));
        $id = (int)$this->db->lastInsertId("situation_geo","id");
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
    situation_geo
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}