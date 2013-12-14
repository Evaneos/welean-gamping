<?php
namespace Gamping\Model\User;

class Writer extends \Berthe\DAL\AbstractWriter {
    public function update(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
UPDATE
    user
SET
    firstname = ?,
    lastname = ?,
    city = ?,
    country = ?,
    description = ?,
    language = ?,
    email = ?,
    phone = ?,
    password = ?,
    created_at = ?,
    updated_at = ?,
    is_banned = ?,
    picture_id = ?
WHERE
    id = ?
SQL;
        return (bool)$this->db->query($sql,
            array(  $object->getFirstname(),
                    $object->getLastname(),
                    $object->getCity(),
                    $object->getCountry(),
                    $object->getDescription(),
                    $object->getLanguage(),
                    $object->getEmail(),
                    $object->getPhone(),
                    $object->getPassword(),
                    $object->getCreatedAt(),
                    $object->getUpdatedAt(),
                    $object->getIsBanned(),
                    $object->getPictureId(),
                    $object->getId()));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $sql = <<<SQL
INSERT INTO
    user
    (
    firstname,
    lastname,
    city,
    country,
    description,
    language,
    email,
    phone,
    password,
    created_at,
    updated_at,
    is_banned
    )
VALUES
    (?, ?, ?, ?, ?, ?, ?
     ?, ?, ?, ?, ?, ?)
SQL;


        $ret = (bool)$this->db->query($sql, array(
            $object->getFirstname(),
            $object->getLastname(),
            $object->getCity(),
            $object->getCountry(),
            $object->getDescription(),
            $object->getLanguage(),
            $object->getEmail(),
            $object->getPhone(),
            $object->getPassword(),
            $object->getCreatedAt(),
            $object->getUpdatedAt(),
            $object->getIsBanned(),
            $object->getPictureId()
            ));
        $id = (int)$this->db->lastInsertId("user","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Berthe\AbstractVO $object) {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id) {
        $sql = <<<SQL
DELETE FROM
    user
WHERE
    id = ?
SQL;
        $ret = (bool)$this->db->query($sql, array($id));
        return $ret;
    }
}