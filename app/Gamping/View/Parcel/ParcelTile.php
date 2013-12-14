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
    
    public function getParcel()
    {
        return $this->parcel;
    }
    
    public function setParcelPicture($picture)
    {
        $this->parcelPicture = $picture;
        
        return $this;
    }
    
    public function getParcelPicture()
    {
        return $this->parcelPicture;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setUserPicture($picture)
    {
        $this->userPicture = $picture;
        
        return $this;
    }
    
    public function getUserPicture()
    {
        return $this->userPicture;
    }
}