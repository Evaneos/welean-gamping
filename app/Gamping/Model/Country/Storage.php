<?php
namespace Gamping\Model\Country;

class Storage extends \Berthe\DAL\AbstractStorage {
    const STORAGE_GUID = __NAMESPACE__;

    public function getByComputername($computername)
    {
        $id = $this->getStorePersistent()->getReader()->getIdByComputerame($computername);
        return $this->getById($id);
    }

    public function getWithActiveParcel()
    {
        $ids = $this->getStorePersistent()->getReader()->getIdsWithActiveParcel();
        return $this->getByIds($ids);
    }


}