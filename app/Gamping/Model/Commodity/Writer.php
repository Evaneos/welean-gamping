<?php
namespace Gamping\Model\Commodity;

class Writer extends \Gamping\DAL\AbstractWriter {
    public function update(\Gamping\AbstractVO $object) {
        return (bool)$this->db->query("UPDATE commodity SET name=? where id=?", array($object->getName(), $object->getId()));
    }

    public function insert(\Gamping\AbstractVO $object) {
        $ret = (bool)$this->db->query("INSERT INTO commodity (name) VALUES (?)", array($object->getName()));
        $id = (int)$this->db->lastInsertId("commodity","id");
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