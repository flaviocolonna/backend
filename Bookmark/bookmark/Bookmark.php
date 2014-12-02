<?php
class Bookmark {
	public $name = '';
	public $url = '';
	public $id = 0;

	public function __construct($name, $url, $id) {
		$this -> name = $name;
		$this -> url = $url;
		$this -> id = $id;
	}

	function getId() {
		return $this -> id;
	}

	function getName() {
		return $this -> name;
	}

	function getUrl() {
		return $this -> url;
	}

	function setId($id) {
		$this -> id = $id;
	}

}
?>