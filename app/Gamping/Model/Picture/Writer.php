<?php
namespace Gamping\Model\Picture;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    picture
SET
    url = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getUrl(), $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    picture
    (url)
VALUES
    (?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getUrl()));
        $id = (int)$this->db->lastInsertId("picture","id");
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
    picture
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}