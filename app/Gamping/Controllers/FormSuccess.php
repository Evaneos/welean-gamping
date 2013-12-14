<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class FormSuccess extends Controller
{
    public $userManager;
    public $parcelManager;


    public function executeAction() {
        $id = $this->getParam('id', 0);
        $hash = $this->getParam('hash', "");

        if ($hash === md5($id . "MD5_SALT")) {
            $parcel = $this->parcelManager->getById($id);
            $user = $this->userManager->getById($parcel->getUserId());

            $this->setData('success', true);
            $this->setData('parcel', $parcel);
            $this->setData('user', $user);
        }
        else {
            $this->setData('success', false);
        }
    }

}