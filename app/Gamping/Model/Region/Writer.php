<?php
namespace Gamping\Model\Region;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        return (bool)$this->db->query("UPDATE region SET name=? where id=?", array($object->getName(), $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $ret = (bool)$this->db->query("INSERT INTO region (name) VALUES (?)", array($object->getName()));
        $id = (int)$this->db->lastInsertId("region","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Berthe\AbstractVO $object) {
        throw new \RuntimeException("delete not implemented yet");
    }

    public function deleteById($id) {
        throw new \RuntimeException("delete not implemented yet");
    }
}