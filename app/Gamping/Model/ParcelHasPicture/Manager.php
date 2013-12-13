<?php
namespace Gamping\Model\ParcelHasPicture;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}