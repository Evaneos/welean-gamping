<?php
namespace Gamping\Model\Parcel;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}