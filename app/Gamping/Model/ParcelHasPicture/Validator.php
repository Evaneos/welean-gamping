<?php
namespace Gamping\Model\ParcelHasPicture;

class Validator extends \Berthe\Validation\AbstractValidator {
    protected function doValidateSave(\Berthe\AbstractVO $vo) {
        return true;
    }

    protected function doValidateDelete(\Berthe\AbstractVO $vo) {
        return true;
    }
}