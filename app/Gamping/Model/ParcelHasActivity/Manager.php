<?php
namespace Gamping\Model\ParcelHasActivity;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }
}