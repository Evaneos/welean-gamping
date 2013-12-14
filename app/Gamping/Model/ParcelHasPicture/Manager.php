<?php
namespace Gamping\Model\ParcelHasPicture;

use Berthe\Fetcher;
class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }
    
    public function getByParcelIds(array $ids)
    {
        $paginator = new Fetcher();
        
        $paginator->addFilter('parcel_id', Fetcher::TYPE_IN, implode(', ', $ids));
        
        return $this->getByPaginator($paginator)->getResultSet();
    }
}