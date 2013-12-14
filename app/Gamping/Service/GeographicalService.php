<?php
namespace Gamping\Service;

use Gamping\View\Parcel\ParcelTile;

class GeographicalService
{

    /**
     *
     * @var \Gamping\Model\Country\Manager
     */
    private $countryManager;

    /**
     *
     * @var \Gamping\Model\Region\Manager
     */
    private $regionManager;

    /**
     *
     * @var \Gamping\Model\Parcel\Manager
     */
    private $parcelManager;

    /**
     *
     * @var \Gamping\Model\User\Manager
     */
    private $userManager;

    /**
     *
     * @var \Gamping\Model\Picture\Manager
     */
    private $pictureManager;

    /**
     *
     * @var \Gamping\Model\ParcelHasPicture\Manager
     */
    private $parcelHasPictureManager;

    public function setCountryManager($manager)
    {
        $this->countryManager = $manager;
    }

    public function setRegionManager($manager)
    {
        $this->regionManager = $manager;
    }

    public function setParcelManager($manager)
    {
        $this->parcelManager = $manager;
    }

    public function setUserManager($manager)
    {
        $this->userManager = $manager;
    }

    public function setParcelHasPictureManager($manager)
    {
        $this->parcelHasPictureManager = $manager;
    }

    public function setPictureManager($manager)
    {
        $this->pictureManager = $manager;
    }

    public function getAllCountries()
    {
        return $this->countryManager->getAll();
    }

    public function getAllCountriesWithActiveParcel()
    {
        return $this->countryManager->getWithActiveParcel();
    }

    public function getCountryById($id)
    {
        if ((int) $id <= 0) {
            throw new \InvalidArgumentException('Invalid country ID.');
        }

        return $this->countryManager->getById($id);
    }

    public function getRegionById($id)
    {
        if ((int) $id <= 0) {
            throw new \InvalidArgumentException('Invalid region ID.');
        }

        return $this->regionManager->getById($id);
    }

    public function getRegionsByCountry(\Gamping\Model\Country\VO $country)
    {
        $countryId = $country->getId();

        return $this->regionManager->getByCountryId($countryId);
    }

    public function getParcelTileViewsByRegion(\Gamping\Model\Region\VO $region)
    {
        $regionId = $region->getId();

        $parcels = $this->parcelManager->getByRegionId($regionId);

        $users = $this->getUsersFromParcels($parcels);
        $userPictures = $this->getPicturesFromUsers($users);

        $parcelIds = array_keys($parcels);
        $parcelsHavePictures = $this->parcelHasPictureManager->getByParcelIds($parcelIds);
        $picturesIds = $this->extractPicturesId($parcelsHavePictures);

        $pictures = $this->pictureManager->getByIds($picturesIds);

        $views = array();

        foreach ($parcels as $parcel) {
            $view = new ParcelTile();
            $user = $users[$parcel->getUserId()];

            $view->setParcel($parcel)
                ->setUser($user);

            $view->setUserPicture($userPictures[$user->getPictureId()]);

            if (array_key_exists($user->getPictureId(), $userPictures)) {
                $view->setUserPicture($userPictures[$user->getPictureId()]);
            }

            $views[] = $view;
        }

        return $views;
    }

    private function getUsersFromParcels(array $parcels)
    {
        $userIds = array();
        foreach ($parcels as $parcel) {
            $userIds[] = $parcel->getUserId();
        }

        return $this->userManager->getByIds($userIds);
    }

    private function getPicturesFromUsers(array $users)
    {
        $ids = $this->extractPicturesId($users);

        return $this->pictureManager->getByIds($ids);
    }

    private function extractPicturesId($items)
    {
        $ids = array();

        foreach ($items as $item) {
            $ids[] = $item->getPictureId();
        }

        return $ids;
    }
}