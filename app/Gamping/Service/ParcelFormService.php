<?php
namespace Gamping\Service;

use Gamping;
use Gamping\Model\Parcel\Builder\Form;
use Gamping\Model\Currency\Manager;

/**
 *
 * @author thibaud
 *        
 */
class ParcelFormService
{

    /**
     *
     * @var Manager
     */
    private $currencyManager;

    private $manager;

    public function setManager(Gamping\Model\Parcel\Manager $manager)
    {
        $this->manager = $manager;
    }

    public function setCurrencyManager($currencyManager)
    {
        $this->currencyManager = $currencyManager;
    }
    

    /**
     *
     * @return \Gamping\Model\Parcel\Builder\Form
     */
    public function getParcelBuilder()
    {
        $builder = new Form();
        
        $builder->setParcel($this->manager->getVoForCreation());
        $builder->setCurrencyManager($this->currencyManager);
        
        return $builder;
    }

    public function saveParcelFromBuilder(Form $builder)
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}