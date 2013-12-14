<?php
namespace Gamping\Model\ParcelHasActivity;

class VO extends \Gamping\AbstractVO {
    const VERSION = 1;

    protected $parcel_id = 0;

    protected $activity_id = 0;

    protected $online = true;

    public function getParcelId()
    {
        return $this->parcel_id;
    }

    public function setParcelId($id)
    {
        $this->parcel_id = (int) $id;
        return $this;
    }

    public function getActivityId()
    {
        return $this->activity_id;
    }

    public function setActivityId($id)
    {
        $this->activity_id = (int) $id;
        return $this;
    }

    public function isOnline()
    {
        return $this->online;
    }

    public function setOnline($online)
    {
        $this->online = (bool) $online;
        return $this;
    }
}