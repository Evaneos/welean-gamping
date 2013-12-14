<?php
namespace Gamping\Model\User;

use \Berthe\ErrorHandler as BertheError;
use \Gamping\Model\ValidationConstants as VConst;

class Validator extends \Berthe\Validation\AbstractValidator {
    const ERROR_NO_MAIL = 1000;
    const ERROR_NO_FIRSTNAME = 2000;
    const ERROR_NO_LASTNAME = 3000;
    const ERROR_NO_PASSWORD = 4000;

    protected function doValidateSave(\Berthe\AbstractVO $vo) {
        if (strlen(trim($vo->getEmail())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no mail', VConst::USER . self::ERROR_NO_MAIL, array($vo->getEmail())));
        }

        if (strlen(trim($vo->getFirstName())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no fn', VConst::USER . self::ERROR_NO_FIRSTNAME, array($vo->getFirstName())));
        }

        if (strlen(trim($vo->getLastName())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no ln', VConst::USER . self::ERROR_NO_LASTNAME, array($vo->getLastName())));
        }

        if (strlen(trim($vo->getPassword())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no pwd', VConst::USER . self::ERROR_NO_PASSWORD, array($vo->getPassword())));
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