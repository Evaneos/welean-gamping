<?php
namespace Gamping\Controllers;

use Gamping\Controller;

class Parcel extends Controller
{
    protected function executeAction()
    {
        $this->setData('bodyClass', 'parcel');
    }

}
