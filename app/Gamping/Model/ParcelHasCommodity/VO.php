<?php
namespace Gamping\Model\ParcelHasCommodity;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $parcel_id = 0;

    protected $commodity_id = 0;

    public function getParcelId()
    {
        return $this->parcel_id;
    }

    public function setParcelId($id)
    {
        $this->parcel_id = (int) $id;
        return $this;
    }

    public function getCommodityId()
    {
        return $this->commodity_id;
    }

    public function setCommodityId($id)
    {
        $this->commodity_id = $id;
    }
}