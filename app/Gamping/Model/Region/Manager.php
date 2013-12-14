<?php
namespace Gamping\Model\Region;

use Berthe\Fetcher;

class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }

    public function getByCountryId($id)
    {
        $paginator = new Fetcher();
        
        $paginator->addFilter('country_id', Fetcher::TYPE_EQ, (int) $id);
        
        return $this->getByPaginator($paginator)->getResultSet();
    }
}