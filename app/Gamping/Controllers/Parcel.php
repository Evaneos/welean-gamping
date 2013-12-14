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

        $this->setData('commodities', $this->commodityManager->getAll());
        $this->setData('activities', $this->activityManager->getAll());
        $this->setData('phc', $this->parcelHasCommodityManager->getByParcelId($id));
        $this->setData('pha', $this->parcelHasActivityManager->getByParcelId($id));
        $this->setData('parcel', $parcel);
        $this->setData('bodyClass', 'parcel');
    }

}
