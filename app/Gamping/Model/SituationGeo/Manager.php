<?php
namespace Gamping\Model\SituationGeo;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}