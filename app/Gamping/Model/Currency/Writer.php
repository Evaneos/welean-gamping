<?php
namespace Gamping\Model\Currency;

class Writer extends \Gamping\DAL\AbstractWriter
{

    private function getParams(VO $currency, $withId = false)
    {
        $params = array(
            ':name' => $currency->getName(),
            ':code' => $currency->getCode()
        );

        if ($withId) {
            $params[':id'] = $currency->getId();
        }

        return $params;
    }

    public function update(\Gamping\AbstractVO $object)
    {
        $sql = <<<SQL
            UPDATE currency
            SET name = :name, code = :code
            WHERE id = :id
SQL;

        return (bool) $this->db->query($sql, $this->getParams($object, true));
    }

    public function insert(\Gamping\AbstractVO $object)
    {
        $sql = <<<SQL
            INSERT INTO currency (name, code)
            VALUES (:name, :code)
SQL;

        $ret = (bool) $this->db->query($sql, $this->getParams($object, false));
        $id = (int) $this->db->lastInsertId("currency", "id");

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
            DELETE FROM currency WHERE id = :id
SQL;

        return (bool) $this->db->query($sql, array(':id' => $id));
    }
}