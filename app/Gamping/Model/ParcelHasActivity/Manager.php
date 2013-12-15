<?php
namespace Gamping\Model\ParcelHasActivity;

class Manager extends \Berthe\AbstractManager {
    public function getVoForCreation() {
        return new VO();
    }

    public function getByParcelId($id) {
        $fetcher = new \Berthe\Fetcher(-1, -1);
        $fetcher->addFilter('parcel_id', \Berthe\Fetcher::TYPE_EQ, $id);
        return $this->getByPaginator($fetcher)->getResultSet();
    }
}