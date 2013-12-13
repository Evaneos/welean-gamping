<?php
namespace Gamping\Model\ParcelHasCommodity;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}