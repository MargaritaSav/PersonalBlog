<?php

class Pagination{
	private $itemsPerPage;
	private $totalOfItems;

	public function __construct($itemsPerPage, $totalOfItems){
		$this->$itemsPerPage = $itemsPerPage;
		$this->$totalOfItems = $totalOfItems;
	}

	public function getPaginationParams(){
		$numberOfPages = ceil($this->$totalOfItems/$this->$itemsPerPage);
		$currentPage = intval($_GET['page']);
		$start = ($currentPage-1)*$this->$itemsPerPage;
		return array('startPosition' => $start, 'numberOfPages' => $numberOfPages);	
	}			
}