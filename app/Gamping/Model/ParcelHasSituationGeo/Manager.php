<?php
namespace Gamping\Model\ParcelHasSituationGeo;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}