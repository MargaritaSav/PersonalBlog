<?php
require_once 'View/View.php';
require_once 'Model/Chapter.php';

class ControllerHomepage{
	private $chapter;

	public function __construct(){
		$this->chapter = new Chapter();
	}

	public function getHomepage(){
		$itemsPerPage = 3;
		$totalOfItems = $this->chapter->getNumberOfChapters();
		$numberOfPages = ceil($totalOfItems/$itemsPerPage);
		if (isset($_GET['page'])) {
			$currentPage = intval($_GET['page']);
			$start = ($currentPage-1)*$itemsPerPage;
			$chapters = $this->chapter->getChapters("desc", $start, $itemsPerPage);

		} else {
			$chapters=$this->chapter->getChapters("desc", 0, $itemsPerPage);
		}		
		$summaryChapters=$this->chapter->getChapters("asc", 0, $totalOfItems);
		$view = new View('Homepage');
		$view-> generate(array('chapters' => $chapters, 'summaryChapters' => $summaryChapters, 'numberOfPages' => $numberOfPages));
	}
}