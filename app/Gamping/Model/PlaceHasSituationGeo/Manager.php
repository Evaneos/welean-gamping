<?php
namespace Gamping\Model\PlaceHasSituationGeo;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}