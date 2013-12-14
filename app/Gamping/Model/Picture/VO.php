<?php
namespace Gamping\Model\Picture;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $url = "";

    public function setUrl($value) {
        $this->url = $value;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }
}