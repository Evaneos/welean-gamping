<?php
namespace Gamping\Model\Activity;

class Validator extends \Berthe\Validation\AbstractValidator {
    protected function doValidateSave(\Gamping\AbstractVO $vo) {
        return true;
    }

    protected function doValidateDelete(\Gamping\AbstractVO $vo) {
        return true;
    }
}