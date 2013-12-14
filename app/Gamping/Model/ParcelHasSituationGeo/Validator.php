<?php
namespace Gamping\Model\ParcelHasSituationGeo;

class Validator extends \Berthe\Validation\AbstractValidator {
    protected function doValidateSave(\Berthe\AbstractVO $vo) {
        return true;
    }

    protected function doValidateDelete(\Berthe\AbstractVO $vo) {
        return true;
    }
}