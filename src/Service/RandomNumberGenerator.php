<?php

namespace App\Service;

class RandomNumberGenerator{

	private $numbers;

	public function __construct(){
		$this->numbers = array(50,60,70,80);
	}

	public function getRandomNumber(){
		try{
			shuffle($this->numbers);
			return $this->numbers[0];	
		}catch(Exception $e){
			echo $e->getmessage();
		}
		
	}
}

