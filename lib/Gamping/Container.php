<?php
namespace Gamping;

class Container extends \DICIT\Container {
    protected static $instance = null;

    public function __construct(\DICIT\Config\AbstractConfig $cfg) {
        $this->registry = new \DICIT\Registry();
        $this->config = $cfg->load();

        $this->initServiceLocator();
    }

    protected function initServiceLocator() {
        self::$instance = $this;
        $this->registry->set('ServiceLocator', self::$instance);
    }

    public function setParameter($key, $value) {
        if (!array_key_exists('parameters', $this->config)) {
            $this->config['parameters'] = array();
        }

        $path = explode('.', $key);
        $root = &$this->config['parameters'];

        while(count($path) > 1) {
            $branch = array_shift($path);
            if (!isset($root[$branch])) {
                $root[$branch] = array();
            }

            $root = &$root[$branch];
        }

        $root[$path[0]] = $value;

        return $this;
    }
}