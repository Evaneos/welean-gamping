<?php
namespace Gamping\Model\ParcelHasCommodity;

use Gamping\Model\ParcelHasCommodity\VO;

class Writer extends \Berthe\DAL\AbstractWriter
{

    private function getParams(VO $object, $withId = false)
    {
    	$params = array(
    	    ':commodity_id' => $object->getCommodityId(),
    	    ':parcel_id' => $object->getParcelId()
	    );
    	
    	if ($withId) {
    	    $params[':id'] = $object->getId();
    	}
    	
    	return $params;
    }

    public function update(\Berthe\AbstractVO $object)
    {
        $query = <<<EOQ
            UPDATE parcel_has_commodity SET 
                commodity_id = :commodity_id, parcel_id = :parcel_id
            WHERE id = :id;     
EOQ;
        
        return (bool) $this->db->query($this->getParams($object, true));
    }

    public function insert(\Berthe\AbstractVO $object)
    {
        $query = <<<EOQ
            INSERT INTO parcel_has_commodity (commodity_id, parcel_id)
                VALUES (:commodity_id, :parcel_id)       
EOQ;
        
        $ret = (bool) $this->db->query($query, $this->getParams($object, false));
        $id = (int) $this->db->lastInsertId("parcel_has_commodity", "id");
        if ($id > 0) {
            $object->setId($id);
            return true;
        } else {
            return false;
        }
    }

    public function delete(\Berthe\AbstractVO $object)
    {
        return $this->deleteById($object->getId());
    }

    public function deleteById($id)
    {
        $query = <<<EOQ
            DELETE FROM parcel_has_commodity WHERE id = :id        
EOQ;
        
        return (bool) $this->db->query($query, array(':id' => $id));
    }
}