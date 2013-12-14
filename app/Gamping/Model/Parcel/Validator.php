<?php
namespace Gamping\Model\Parcel;

use \Berthe\ErrorHandler as BertheError;
use \Gamping\Model\ValidationConstants as VConst;

class Validator extends \Berthe\Validation\AbstractValidator {
    const ERROR_NO_HOSTING = 1000;
    const ERROR_NO_PRICE_MIN = 3000;
    const ERROR_NO_PRICE_ADD = 3500;
    const ERROR_NO_TITLE = 5000;
    const ERROR_NO_DESC = 6000;


    protected function doValidateSave(\Berthe\AbstractVO $vo) {
        if (!$vo->hasTents() && !$vo->hasCaravans() && !$vo->hasCampingCars()) {
            $this->getErrors()->addError(new BertheError\Error('no hosting', VConst::PARCEL . self::ERROR_NO_HOSTING, array($vo->getPricePerAdult())));
        }

        if ($vo->getPricePerAdult() < 1) {
            $this->getErrors()->addError(new BertheError\Error('no price', VConst::PARCEL . self::ERROR_NO_PRICE_MIN, array($vo->getPricePerAdult())));
        }

        if ($vo->getPricePerExtraAdult() < 1) {
            $this->getErrors()->addError(new BertheError\Error('no price', VConst::PARCEL . self::ERROR_NO_PRICE_ADD, array($vo->getPricePerExtraAdult())));
        }

        if (strlen(trim($vo->getDescription())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no desc', VConst::PARCEL . self::ERROR_NO_DESC, array($vo->getDescription())));
        }

        if (strlen(trim($vo->getTitle())) < 1) {
            $this->getErrors()->addError(new BertheError\Error('no title', VConst::PARCEL . self::ERROR_NO_TITLE, array($vo->getTitle())));
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