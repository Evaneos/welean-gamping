<?php
namespace Gamping\Model\Picture;

use Berthe\Paginator;
use Berthe\Fetcher;
class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }
   
}