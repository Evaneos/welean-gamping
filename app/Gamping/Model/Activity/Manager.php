<?php
namespace Gamping\Model\Activity;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}