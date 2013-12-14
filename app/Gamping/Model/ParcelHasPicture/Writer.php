<?php
namespace Gamping\Model\ParcelHasPicture;

class Writer extends \Gamping\DAL\AbstractWriter {
    public function update(\Gamping\AbstractVO $object) {
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

    public function insert(\Gamping\AbstractVO $object) {
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

    public function delete(\Gamping\AbstractVO $object) {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    parcel_has_picture
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}