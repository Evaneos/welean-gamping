<?php
namespace Gamping\Model\Picture;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}