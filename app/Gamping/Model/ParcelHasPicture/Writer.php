<?php
namespace Gamping\Model\ParcelHasPicture;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    parcel_has_picture
SET
    parcel_id = ?,
    picture_id = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getParcelId(), $object->getPictureId(), $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    parcel_has_picture
    (parcel_id,
    picture_id)
VALUES
    (?, ?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getParcelId(), $object->getPictureId));
        $id = (int)$this->db->lastInsertId("parcel_has_picture","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
DELETE FROM
    parcel_has_picture
WheRE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($object->getId()))
        return $ret;
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    parcel_has_picture
WheRE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($object->getId()))
        return $ret;
    }
}