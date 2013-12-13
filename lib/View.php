<?php

namespace Gamping;

class View {
	protected $file = '';
	protected $replacements = array();
	protected $enabled = true;

	static protected $partials = array();

	public function __construct($file=null) {
		if(null!==$file) {
			$this->setFile($file);
		}
	}

	public function enable() {
		$this->enabled = true;
		return $this;
	}

	public function disable() {
		$this->enabled = false;
		return $this;
	}

	public function isEnabled() {
		return $this->enabled;
	}

	public function setFile($file) {
		$this->file = $file;
		return $this;
	}

	public function assign($key, $val) {
		$this->replacements[$key] = $val;
		return $this;
	}

	public function assignx($assocArray) {
		foreach($assocArray as $k=>$v) {
			$this->assign($k, $v);
		}
		return $this;
	}

	public function resetReplacements() {
		$this->replacements = array();
	}

	public function has($k) {
		return array_key_exists($k, $this->replacements);
	}

	public function get($k, $default=null) {
		return  $this->has($k) ? $this->replacements[$k] : $default;
	}

	public function __set($k, $v) {
		$this->assign($k, $v);
	}

	public function __get($k) {
		return $this->get($k);
	}

	protected function partial($file, $data=null) {
		$partial = new self($file);
		if(null!==$data) {
			$partial->assignx($data);
		}
		return $partial->compile();
	}

	protected function partialLoop($file, $dataSet) {
		$partial = new self($file);
		$return = '';
		foreach($dataSet as $data) {
			$partial->assignx($data);
			$return.=$partial->compile();
			$partial-resetReplacements();
		}
		return $return;
	}

	public function compile() {
		if(false==$this->enabled) {
			return '';
		}

		ob_start();
		if(false===include($this->file)) {
			ob_get_clean();
			throw new \RuntimeException('Unable to include the view file '.$this->file);
		}
		return ob_get_clean();
	}

	public function display() {
		echo $this->compile();
	}
}