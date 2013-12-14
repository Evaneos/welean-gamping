<?php
namespace Gamping\Model\ParcelHasSituationGeo;

class Writer extends \Gamping\DAL\AbstractWriter {
    public function update(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    parcel_has_situation_geo
SET
    parcel_id = ?,
    situation_geo_id = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getParcelId(), $object->getSituationGeoId(), $object->getId()));
    }

    public function insert(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    parcel_has_situation_geo
    (parcel_id, situation_geo_id)
VALUES
    (?, ?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getParcelId(), $object->getSituationGeoId()));
        $id = (int)$this->db->lastInsertId("parcel_has_situation_geo","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
        }
    }

    public function delete(\Gamping\AbstractVO $object) {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    parcel_has_situation_geo
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}