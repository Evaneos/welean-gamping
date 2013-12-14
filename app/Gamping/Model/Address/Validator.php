<?php
namespace Gamping\Model\Address;

use \Berthe\ErrorHandler as BertheError;
use \Gamping\Model\ValidationConstants as VConst;

class Validator extends \Berthe\Validation\AbstractValidator {
    const ERROR_NO_ADDRESS = 1000;
    const ERROR_NO_ZIPCODE = 2000;
    const ERROR_NO_CITY = 3000;

    protected function doValidateSave(\Berthe\AbstractVO $vo) {
        if (strlen(trim($vo->getAddress())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no add', VConst::ADDRESS . self::ERROR_NO_ADDRESS, array($vo->getAddress())));
        }

        if (strlen(trim($vo->getZipCode())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no zc', VConst::ADDRESS . self::ERROR_NO_ZIPCODE, array($vo->getZipCode())));
        }

        if (strlen(trim($vo->getCity())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no city', VConst::ADDRESS . self::ERROR_NO_CITY, array($vo->getCity())));
        }

        if ($this->getErrors()->hasErrors()) {
            $this->getErrors()->throwMe();
        }

        return true;
    }

    protected function doValidateDelete(\Berthe\AbstractVO $vo) {
        return true;
    }
}