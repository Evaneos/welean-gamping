<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class Form extends Controller
{
    /**
     *
     * @var ParcelFormService
     */
    private $formService;

    public function setFormService($parcelFormService)
    {
        $this->formService = $parcelFormService;
    }

    protected function executeAction()
    {
        $isSubmit = $this->getParam('submit', false);

        if ($isSubmit !== false) {
            $builder = $this->formService->getParcelBuilder();

            $this->setRates($builder);
            $this->setCommodities($builder);
            $this->setActivities($builder);

            $this->formService->saveParcelFromBuilder($builder);
        }

        $this->setData('countries', $this->formService->getAllCountries());
        $this->setData('activities', $this->formService->getAllActivites());
        $this->setData('commodities', $this->formService->getAllCommodities());
        $this->setData('bodyClass', 'add');
    }

    private function setRates($builder)
    {
        $currencyCode = $this->getParam('currency', '');

        $adultPrice = (float) $this->getParam('price_base', 0);
        $extraAdultPrice = (float) $this->getParam('price_extra', 0);

        $builder->setRates($currencyCode, $adultPrice, $extraAdultPrice);
    }

    private function setCommodities($builder)
    {
        $commodities = $this->getParam('commodities', array());
        foreach ($commodities as $commodity) {
            $builder->addCommodity((int) $commodity);
        }
    }

    private function setActivities($builder)
    {
        $activities = $this->getParam('activities', array());
        foreach ($activities as $activity) {
            $builder->addActivity((int) $activity);
        }
    }
}