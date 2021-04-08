<?php

namespace APP\Service;

interface currentYear{
	
	public function setCurrentYear();
}

class DateCalculator implements currentYear{

	private $diff;
	private $year;
	private $curYear;

	public function __construct($year){
		$this->year = $year;
		
	}

	public function setCurrentYear(){
		$this->curYear = date("Y");
	}

	public function diffYears(){
		$this->diff = $this->curYear - $this->year;
		return $this->diff;
	}
}