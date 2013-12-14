<?php
namespace Gamping\DAL;

abstract class AbstractWriter {
    protected $defaultLanguageId = 1;

    /**
     * @var \Berthe\DAL\DbWriter
     */
    protected $db = null;

    public function setDb(\Berthe\DAL\DbWriter $db) {
        $this->db = $db;
        return $this;
    }

    public function setDefaultLanguageId($langId) {
        $this->defaultLanguageId = $langId;
    }

    public function getDefaultLanguageId() {
        return $this->defaultLanguageId;
    }

    /**
     * Insert the object in database
     * @param \Gamping\AbstractVO $object the object to insert
     * @return boolean
     */
    abstract public function insert(\Gamping\AbstractVO $object);
    /**
     * Update the object in database
     * @param \Gamping\AbstractVO $object the object to insert
     * @return boolean
     */
    abstract public function update(\Gamping\AbstractVO $object);
    /**
     * Delete the object from database
     * @param \Gamping\AbstractVO $object the object to insert
     * @return boolean
     */
    abstract public function delete(\Gamping\AbstractVO $object);
    /**
     * Delete an object by id from database
     * @param int $int object identifier
     * @return boolean
     */
    abstract public function deleteById($id);
}