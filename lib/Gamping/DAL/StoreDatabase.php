<?php
namespace Gamping\DAL;

class StoreDatabase extends \Berthe\DAL\StoreDatabase {
    public function setReader(AbstractReader $reader) {
        $this->reader = $reader;
        return $this;
    }

    public function setWriter(AbstractWriter $writer) {
        $this->writer = $writer;
        return $this;
    }
}