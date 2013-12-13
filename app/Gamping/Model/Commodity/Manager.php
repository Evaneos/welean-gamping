<?php
namespace Gamping\Model\Commodity;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}