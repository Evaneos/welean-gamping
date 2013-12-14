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
            var_dump($this->getAllParams());
            $builder = $this->formService->getParcelBuilder();

            $this->setRates($builder);
            $this->setCommodities($builder);
            $this->setActivities($builder);
            $this->setFormData($builder);
            $this->setHost($builder);
            var_dump($builder);
            die();
            $this->formService->saveParcelFromBuilder($builder);
        }

        $this->setData('countries', $this->formService->getAllCountries());
        $this->setData('activities', $this->formService->getAllActivites());
        $this->setData('commodities', $this->formService->getAllCommodities());
        $this->setData('situationGeos', $this->formService->getAllSituationGeo());
        $this->setData('currencies', $this->formService->getAllCurrencies());
        $this->setData('bodyClass', 'add');
    }

    private function setHost($builder) {
        $tent = (int) $this->getParam('hosting_tent', 0);
        $description = (int) $this->getParam('hosting_caravan', 0);
        $campingcar = (int) $this->getParam('hosting_campingcar', 0);

        $builder->setHosting($tent, $description, $campingcar);
    }

    private function setFormData($builder) {
        $country = (int)$this->getParam('country', 0);
        $description = (string) $this->getParam('description', '');
        $rules = (string) $this->getParam('rules', '');
        $capacity = (string) $this->getParam('count', 0);
        $title = (string) $this->getParam('title', '');

        $builder->setRawData($country, $description, $rules, $capacity, $title);
    }

    private function setRates($builder)
    {
        $currency = (int)$this->getParam('currency', '');

        $adultPrice = (float) $this->getParam('price_base', 0);
        $extraAdultPrice = (float) $this->getParam('price_extra', 0);

        $builder->setRates($currency, $adultPrice, $extraAdultPrice);
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