<?php
namespace Gamping\Model\User;

class VO extends \Berthe\AbstractVO {
    const VERSION = 1;

    protected $firstname = "";
    protected $lastname = "";
    protected $city = "";
    protected $country = "";
    protected $description = "";
    protected $language = "";
    protected $email = "";
    protected $phone = "";
    protected $password = "";
    protected $created_at = null;
    protected $updated_at = null;
    protected $is_banned = 0;
    protected $picture_id = 0;

    public function setFirstname($value) {
        $this->firstname = $value;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setLastname($value) {
        $this->lastname = $value;
        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setCity($value) {
        $this->city = $value;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCountry($value) {
        $this->country = $value;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setDescription($value) {
        $this->description = $value;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setLanguage($value) {
        $this->language = $value;
        return $this;
    }

    public function getLanguage() {
        return $this->language;
    }


    public function setEmail($value) {
        $this->email = $value;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPhone($value) {
        $this->phone = $value;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPassword($value) {
        $this->password = $value;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setCreatedAt(DateTime $value) {
        $this->created_at = $value;
        return $this;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setUpdatedAt($value) {
        $this->updated_at = $value;
        return $this;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setIsBanned($value) {
        $this->is_banned = $value;
        return $this;
    }

    public function getIsBanned() {
        return $this->is_banned;
    }
    
    public function setPictureId($id) {
        $this->picture_id = $id;
        return $this;
    }
    
    public function getPictureId() {
        return $this->picture_id;
    }
}