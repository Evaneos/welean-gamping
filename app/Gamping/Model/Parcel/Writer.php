<?php
namespace Gamping\Model\Parcel;

class Writer extends \Berthe\DAL\AbstractWriter {
    
    private function getParams(VO $parcel, $withId = false)
    {
        $params = array(
        	':address_id' => $parcel->getAddressId(),
            ':capacity' => $parcel->getCapacity(),
            ':country_id' => $parcel->getCountryId(),
            ':created_at' => $parcel->getCreatedAt(),
            ':currency_iso3' => $parcel->getCurrencyCode(),
            ':description' => $parcel->getDescription(),
            ':hosts_camping_cars' => (int) $parcel->hasCampingCars(),
            ':hosts_caravans' => (int) $parcel->hasCaravans(),
            ':hosts_tents' => (int) $parcel->hasTents(),
            ':latitude' => $parcel->getLatitude(),
            ':longitude' => $parcel->getLongitude(),
            ':online' => (int) $parcel->isOnline(),
            ':place_id' => (int) $parcel->getPlaceId(),
            ':price_per_adult' => $parcel->getPricePerAdult(),
            ':price_per_child' => $parcel->getPricePerChild(),
            ':region_id' => $parcel->getRegionId(),
            ':rules' => $parcel->getRules(),
            ':title' => $parcel->getTitle(),
            ':updated_at' => $parcel->getUpdatedAt(),
            ':user_id' => $parcel->getUserId()
        );
        
        if ($withId) {
            $params[':id'] = $parcel->getId();
        }
        
        return $params;
    }
    
    public function update(\Berthe\AbstractVO $object) {
        $query = <<<EOQ
            UPDATE parcel SET 
                address_id = :address_id, capacity = :capacity,
                country_id = :country_id, created_at = :created_at,
                currency_iso3 = :currency_iso3, description = :description,
                hosts_camping_cars = :hosts_camping_cars, hosts_caranvans = :hosts_caravans,
                hosts_tents = :hosts_tents, latitude = :latitude, longitude = :longitude,
                online = :online, place_id = :place_id, price_per_adult = :price_per_adult,
                price_per_child = :price_per_child, region_id = :region_id,
                rules = :rules, title = :title, updated_at = :updated_at, user_id = :user_id
        WHERE id = :id;
EOQ;
        
        return (bool) $this->db->query($query, $this->getParams($object, true));
    }

    public function insert(\Berthe\AbstractVO $object) {
        $query = <<<EOQ
            INSERT INTO parcel COLUMNS(
                address_id, capacity,
                country_id, created_at,
                currency_iso3, description,
                hosts_camping_cars, hosts_caranvans,
                hosts_tents, latitude, longitude,
                online, place_id, price_per_adult,
                price_per_child, region_id,
                rules, title, updated_at, user_id)
            VALUES (
                :address_id, :capacity,
                :country_id, :created_at,
                :currency_iso3, :description,
                :hosts_camping_cars, :hosts_caravans,
                :hosts_tents, :latitude, :longitude,
                :online, :place_id, :price_per_adult,
                :price_per_child, :region_id,
                :rules, :title, :updated_at, :user_id);
EOQ;
        
        $ret = (bool)$this->db->query($query, $this->getParams($object, false));
        $id = (int)$this->db->lastInsertId("parcels","id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete(\Berthe\AbstractVO $object) {
        throw new \RuntimeException("delete not implemented yet");
    }

    public function deleteById($id) {
        throw new \RuntimeException("delete not implemented yet");
    }
}