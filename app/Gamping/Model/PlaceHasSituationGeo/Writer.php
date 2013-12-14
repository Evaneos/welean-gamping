<?php
namespace Gamping\Model\PlaceHasSituationGeo;

class Writer extends \Gamping\DAL\AbstractWriter {
    public function update(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    place_has_situation_geo
SET
    place_id = ?,
    situation_geo_id = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql, array($object->getPlaceId(), $object->getSituationGeoId(), $object->getId()));
    }

    public function insert(\Gamping\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    place_has_situation_geo
    (place_id, situation_geo_id)
VALUES
    (?, ?)
SQL;


        $ret = (bool)$this->db->query($sql, array($object->getPlaceId(), $object->getSituationGeoId()));
        $id = (int)$this->db->lastInsertId("place_has_situation_geo","id");
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
    place_has_situation_geo
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}