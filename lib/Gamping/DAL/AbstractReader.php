<?php
namespace Gamping\DAL;

abstract class AbstractReader extends \Berthe\DAL\AbstractReader {
    protected $defaultLanguageId = 1;

    public function setDefaultLanguageId($langId) {
        $this->defaultLanguageId = $langId;
    }

    public function getDefaultLanguageId() {
        return $this->defaultLanguageId;
    }

    /**
     * Implements a bunch of \Gamping\AbstractVO from datas
     * @param array $datas
     * @return \Gamping\AbstractVO
     */
    protected function implementVOs(array $datas = array()) {
        $ret = array();

        $class = $this->getVOClass();

        if($class == self::VO_CLASS) {
            throw new \RuntimeException(__CLASS__ . '::VO_CLASS constant is not defined');
        }

        foreach($datas as &$row) {
            $ret[$row['id']] = new $class($row, $this->getDefaultLanguageId());
        }

        return $ret;
    }
}