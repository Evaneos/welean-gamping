<?php
namespace Gamping\Model\Address;

class Writer extends \Gamping\DAL\AbstractWriter
{

    private function getParams(VO $address, $withId = false)
    {
        $params = array(
            ':address' => $address->getAddress(),
            ':city' => $address->getCity(),
            ':locality' => $address->getLocality(),
            ':zipCode' => $address->getZipCode()
        );

        if ($withId) {
            $params[':id'] = $address->getId();
        }

        return $params;
    }

    public function update(\Gamping\AbstractVO $object)
    {
        $sql = <<<SQL
            UPDATE address
            SET address = :address, locality = :locality, zip_code = :zipCode, city = :city
            WHERE id = :id
SQL;

        return (bool) $this->db->query($sql, $this->getParams($object, true));
    }

    public function insert(\Gamping\AbstractVO $object)
    {
        $sql = <<<SQL
            INSERT INTO address (address, locality, zip_code, city)
            VALUES (:address, :locality, :zipCode, :city)
SQL;

        $ret = (bool) $this->db->query($sql, $this->getParams($object, false));
        $id = (int) $this->db->lastInsertId("address", "id");

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
            DELETE FROM address WHERE id = :id
SQL;

        return (bool) $this->db->query($sql, array(':id' => $id));
    }
}