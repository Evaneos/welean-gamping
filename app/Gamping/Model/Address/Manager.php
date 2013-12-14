<?php
namespace Gamping\Model\Address;

use Berthe\Fetcher;

class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }
}