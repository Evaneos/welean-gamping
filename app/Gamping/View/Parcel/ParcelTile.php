<?php

namespace Gamping\View\Parcel;

class ParcelTile
{
    private $parcel;

    private $parcelPicture;
    
    private $user;
    
    private $userPicture;
    
    public function setParcel($parcel)
    {
        $this->parcel = $parcel;
        
        return $this;
    }
    
    /**
     * @return \Gamping\Model\Parcel\VO
     */
    public function getParcel()
    {
        return $this->parcel;
    }
    
    public function setParcelPicture($picture)
    {
        $this->parcelPicture = $picture;
        
        return $this;
    }
    
    /**
     * @return \Gamping\Model\Picture\VO
     */
    public function getParcelPicture()
    {
        return $this->parcelPicture;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }
    
    /**
     * @return \Gamping\Model\User\VO
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function setUserPicture($picture)
    {
        $this->userPicture = $picture;
        
        return $this;
    }
    
    /**
     * @return \Gamping\Model\Picture\VO
     */
    public function getUserPicture()
    {
        return $this->userPicture;
    }
}