<?php
namespace Gamping\Model\Activity;

class Writer extends \Gamping\DAL\AbstractWriter {

    private function getParams(VO $object, $withId = false)
    {
        $params = array(
            ':address_id' => $object->getAddressId(),
            ':description' => $object->getDescription(),
            ':name' => $object->getName(),
            ':place_id' => $object->getPlaceId()
        );

        if ($withId) {
            $params[':id'] = $object->getId();
        }

        return $params;
    }

    public function update(\Gamping\AbstractVO $object) {
        $query = <<<EOQ
            UPDATE activity SET
                address_id = :address_id, description = :description,
                name = :name, place_id = :place_id
            WHERE id = :id
EOQ;

        return (bool) $this->db->query($query, $this->getParams($object, true));
    }

    public function insert(\Gamping\AbstractVO $object) {
        $query = <<<EOQ
            INSERT INTO activity (address_id, description, name, place_id)
            VALUES (:address_id, :description, :name, :place_id)
EOQ;

        $ret = (bool) $this->db->query($query, $this->getParams($object, false));
        $id = (int) $this->db->lastInsertId("activity","id");

        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Gamping\AbstractVO $object) {
        throw new \RuntimeException("delete not implemented yet");
    }

    public function deleteById($id) {
        throw new \RuntimeException("delete not implemented yet");
    }
}