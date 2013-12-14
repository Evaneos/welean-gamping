<?php
namespace Gamping\Model\Parcel;

use Berthe\Fetcher;
class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }
    
    /**
     * 
     * @param int $id
     * @return \Gamping\Model\Parcel\VO[]
     */
    public function getByRegionId($id)
    {
        $paginator = new Fetcher();
        
        $paginator->addFilter('region_id', Fetcher::TYPE_EQ, $id);
        
        return $this->getByPaginator($paginator)->getResultSet();
    }
    
}