<?php
namespace Gamping\Controllers\Search;

use Gamping\Controller;

class ParcelsSearch extends Controller
{
    /**
     *
     * @var \Gamping\Service\GeographicalService
     */
    private $geographicalService;

    public function setGeographicalService($service)
    {
        $this->geographicalService = $service;
    }

    protected function executeAction()
    {
        $parcelViews = array();
        $rid = $this->getParam('rid', 0);
        $cid = $this->getParam('cid', 0);

        if ($rid > 0)
        {
            $region = $this->geographicalService->getRegionById($rid);
            $parcelViews = $this->geographicalService->getParcelTileViewsByRegion($region);
        }

        if ($cid > 0)
        {
            $country = $this->geographicalService->getCountryById($cid);
            $parcelViews = $this->geographicalService->getParcelTileViewsByCountry($country);
        }

        $this->setData('parcelViews', $parcelViews);
    }

}
