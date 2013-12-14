<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

use \Gamping\Model\ValidationConstants as VConst;
use \Gamping\Model\Parcel\Validator as VParcel;
use \Gamping\Model\User\Validator as VUser;
use \Gamping\Model\Address\Validator as VAddress;


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

    protected function error(\Berthe\ErrorHandler\Errors $e) {
        $errors = $e->getErrors();
        foreach($errors as $error) {
            switch($error->getCode()) {
                case VConst::PARCEL . VParcel::ERROR_NO_HOSTING :
                    $this->setData('errorHosting', true);
                    break;
                case VConst::PARCEL . VParcel::ERROR_NO_PRICE_MIN :
                case VConst::PARCEL . VParcel::ERROR_NO_PRICE_ADD :
                    $this->setData('errorPrice', true);
                    break;
                case VConst::PARCEL . VParcel::ERROR_NO_TITLE :
                    $this->setData('errorTitle', true);
                    break;
                case VConst::PARCEL . VParcel::ERROR_NO_DESC :
                    $this->setData('errorDesc', true);
                    break;
                case VConst::USER . VUser::ERROR_NO_MAIL :
                case VConst::USER . VUser::ERROR_NO_FIRSTNAME :
                case VConst::USER . VUser::ERROR_NO_LASTNAME :
                case VConst::USER . VUser::ERROR_NO_PASSWORD :
                    $this->setData('errorUser', true);
                    break;
                case VConst::ADDRESS . VAddress::ERROR_NO_ADDRESS :
                case VConst::ADDRESS . VAddress::ERROR_NO_ZIPCODE :
                case VConst::ADDRESS . VAddress::ERROR_NO_CITY :
                    $this->setData('errorAddress', true);
                    break;
            }
        }
    }

    protected function executeAction()
    {
        $isSubmit = $this->getParam('submit', false);
        $this->setData('errorHosting', false);
        $this->setData('errorPrice', false);
        $this->setData('errorPrice', false);
        $this->setData('errorTitle', false);
        $this->setData('errorDesc', false);

        $this->setData('errorAddress', false);
        $this->setData('errorUser', false);


        if ($isSubmit !== false) {
            $this->setData('formData', $this->getAllParams());
            $builder = $this->formService->getParcelBuilder();

            $this->setRates($builder);
            $this->setCommodities($builder);
            $this->setActivities($builder);
            $this->setFormData($builder);
            $this->setHost($builder);
            $this->setAddress($builder);
            $this->setUser($builder);
            $this->setCountry($builder);
            $builder->setLatLng();

            try {
                $parcel = $this->formService->saveParcelFromBuilder($builder);
                header('Location: ' . '/success/' . $parcel->getId() . '/' . md5($parcel->getID() . 'MD5_SALT'));
            }
            catch(\Berthe\ErrorHandler\Errors $e) {
                $this->error($e);
            }

        }
        else {
            $this->setData('formData', array());
        }

        $this->setData('countries', $this->formService->getAllCountries());
        $this->setData('activities', $this->formService->getAllActivites());
        $this->setData('commodities', $this->formService->getAllCommodities());
        $this->setData('situationGeos', $this->formService->getAllSituationGeo());
        $this->setData('currencies', $this->formService->getAllCurrencies());
        $this->setData('bodyClass', 'add');
    }

    private function setUser($builder) {
        $firstname = (string) $this->getParam('firstname', '');
        $lastname = (string) $this->getParam('lastname', '');
        $email = (string) $this->getParam('email', '');
        $password = (string) $this->getParam('password', '');

        $builder->setUserInformation($firstname, $lastname, $email, $password);
    }

    private function setAddress($builder) {
        $address1 = (string) $this->getParam('address1', '');
        $address2 = (string) $this->getParam('address2', '');
        $zip = (string) $this->getParam('zip', '');
        $city = (string) $this->getParam('city', '');

        $builder->setAddressInformation($address1, $address2, $zip, $city);
    }

    private function setCountry($builder) {
        $countryId = (int) $this->getParam('country', '');
        $country = $this->formService->getCountryById($countryId);

        $builder->setCountry($country);
    }

    private function setHost($builder) {
        $tent = (int) $this->getParam('hosting_tent', 0);
        $description = (int) $this->getParam('hosting_caravan', 0);
        $campingcar = (int) $this->getParam('hosting_campingcar', 0);

        $builder->setHosting($tent, $description, $campingcar);
    }

    private function setFormData($builder) {
        $description = (string) $this->getParam('description', '');
        $rules = (string) $this->getParam('rules', '');
        $capacity = (string) $this->getParam('count', 0);
        $title = (string) $this->getParam('title', '');

        $builder->setRawData($description, $rules, $capacity, $title);
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