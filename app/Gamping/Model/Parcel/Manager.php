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
     * @param int $id The RegionId
     * @return \Gamping\Model\Parcel\VO[]
     */
    public function getByRegionId($id)
    {
        $paginator = new Fetcher();
        
        $paginator->addFilter('region_id', Fetcher::TYPE_EQ, $id);
        
        return $this->getByPaginator($paginator)->getResultSet();
    }

    /**
     *
     * @param int $id The CountryId
     * @return \Gamping\Model\Parcel\VO[]
     */
    public function getByCountryId($id)
    {
        $paginator = new Fetcher();

        $paginator->addFilter('country_id', Fetcher::TYPE_EQ, $id);

        return $this->getByPaginator($paginator)->getResultSet();
    }

}