<?php

namespace Gamping\Service;

use Gamping;

class HomeService
{

    /**
     * @var \Gamping\Model\Parcel\Manager
     */
    private $parcelManager;


    /**
     * @var \Gamping\Model\Country\Manager
     */
    private $countryManager;


    public function setCountryManager($manager)
    {
        $this->countryManager = $manager;
    }

    public function setParcelManager($manager)
    {
        $this->parcelManager = $manager;
    }

    public function getAllCountriesWithActiveParcel() {
        return $this->countryManager->getAll();
    }

}