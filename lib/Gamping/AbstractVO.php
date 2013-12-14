<?php

namespace Gamping;


class AbstractVO extends \Berthe\AbstractVO {
    protected $translationTable = array();
    protected $instanciationLanguage = null;
    /**
     * Constructor
     * @param array $infos An array of infos from database or form
     */
    public function __construct(array $properties = array(), $lang = null) {
        $this->instanciationLanguage = $lang;
        $this->setProperties($properties);
        $this->calcProperties();
    }

    public function setTranslation($key, $value, $lang = null) {
        if (!array_key_exists($key, $this->translationTable)) {
            $this->translationTable[$key] = array();
        }

        if (!$lang) {
            $lang = $this->instanciationLanguage;
        }

        $this->translationTable[$key][$lang] = $value;
    }

    public function getTranslation($key, $lang = null) {
        if (!$lang) {
            $lang = $this->instanciationLanguage;
        }

        if (array_key_exists($key, $this->translationTable) && array_key_exists($lang, $this->translationTable[$key])) {
            return $this->translationTable[$key][$lang];
        }
        else {
            return null;
        }
    }

    protected function setProperties($properties) {
        foreach($properties as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
            else {
                if (preg_match("`translation_(.*)$`i", $key, $match)) {
                    $this->setTranslation($match[1], $value);
                }
            }
        }
    }
}