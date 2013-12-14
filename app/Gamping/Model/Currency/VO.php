<?php
namespace Gamping\Model\Currency;

class VO extends \Gamping\AbstractVO
{

    const VERSION = 1;

    protected $name = "";

    protected $code = "";

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

}