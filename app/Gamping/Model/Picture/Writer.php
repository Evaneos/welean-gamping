<?php
namespace Gamping\Model\Picture;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        return (bool)$this->db->query("UPDATE picture SET name=? where id=?", array($object->getName(), $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $ret = (bool)$this->db->query("INSERT INTO picture (name) VALUES (?)", array($object->getName()));
        $id = (int)$this->db->lastInsertId("picture","id");
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