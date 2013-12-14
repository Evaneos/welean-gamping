<?php
namespace Gamping\Model\Country;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }


    public function getByComputername($computername){
        return $this->getStorage()->getByComputername($computername);
    }
}