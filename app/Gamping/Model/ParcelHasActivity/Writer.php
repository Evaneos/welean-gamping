<?php
namespace Gamping\Model\ParcelHasActivity;

class Writer extends \Gamping\DAL\AbstractWriter
{

    private function getParams(VO $object, $withId = false)
    {
        $params = array(
            ':activity_id' => $object->getActivityId(),
            ':parcel_id' => $object->getParcelId()
        );

        if ($withId) {
            $params[':id'] = $object->getId();
        }

        return $params;
    }

    public function update(\Gamping\AbstractVO $object)
    {
        $query = <<<EOQ
            UPDATE parcel_has_activity SET
                activity_id = :activity_id,
                parcel_id = :parcel_id
            WHERE id = :id
EOQ;

        return (bool) $this->db->query($query, $this->getParams($object, true));
    }

    public function insert(\Gamping\AbstractVO $object)
    {
        $query = <<<EOQ
            INSERT INTO parcel_has_activity (activity_id, parcel_id)
            VALUES (:activity_id, :parcel_id)
EOQ;

        $ret = (bool) $this->db->query($query, $this->getParams($object, false));
        $id = (int) $this->db->lastInsertId("parcel_has_activity", "id");

        if ($id > 0) {
            $object->setId($id);
            return true;
        } else {
            return false;
        }
    }

    public function delete(\Gamping\AbstractVO $object)
    {
        throw new \RuntimeException("delete not implemented yet");
    }

    public function deleteById($id)
    {
        throw new \RuntimeException("delete not implemented yet");
    }
}