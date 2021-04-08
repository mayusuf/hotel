<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Hotel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use App\Service\DateCalculator;


class IndexController extends AbstractController {

	private const HOTEL_OPENED = 1969;
    
    public function home(){
        
        $DateCalculator = new DateCalculator(self::HOTEL_OPENED);
        $DateCalculator->setCurrentYear();
        $year = $DateCalculator->diffYears();

        $hotels = $this->getDoctrine()
        	 ->getRepository(Hotel::class)
        	 ->findAllBelowPrice(750);

        //print_r($hotels);
        
        $images = [
        	['url' => 'images/hotel/intro_room.jpg', 'class' => ''],
        	['url' => 'images/hotel/intro_pool.jpg', 'class' => ''],
        	['url' => 'images/hotel/intro_dining.jpg', 'class' => ''],
        	['url' => 'images/hotel/intro_attractions.jpg', 'class' => ''],
        	['url' => 'images/hotel/intro_wedding.jpg', 'class' => 'hidesm']
        ];

        return $this->render('index.html.twig',['year'=>$year,'images'=>$images,'hotels'=>$hotels]);
    }
    
}
