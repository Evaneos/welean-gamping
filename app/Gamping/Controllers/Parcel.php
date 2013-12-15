<?php
namespace Gamping\Controllers;

use Gamping\Controller;

class Parcel extends Controller
{
    public $userManager;
    public $parcelManager;
    public $activityManager;
    public $commodityManager;

    public $countryManager;
    public $regionManager;

    public $parcelHasActivityManager;
    public $parcelHasCommodityManager;


    protected function executeAction()
    {
        $id = $this->getParam('id', null);
        if ($id) {
            $parcel = $this->parcelManager->getById($id);
        }

        $cnm = $this->parcelHasCommodityManager->getByParcelId($id);
        $anm = $this->parcelHasActivityManager->getByParcelId($id);

        $phc = array();
        foreach($cnm as $nm) {
            $phc[$nm->getCommodityId()] = $phc;
        }

        $pha = array();
        foreach($anm as $nm) {
            $pha[$nm->getActivityId()] = $pha;
        }

        $this->setData('commodities', $this->commodityManager->getAll());
        $this->setData('activities', $this->activityManager->getAll());
        $this->setData('phc', $phc);
        $this->setData('pha', $pha);
        $this->setData('parcel', $parcel);
        $this->setData('bodyClass', 'parcel');
    }

}
