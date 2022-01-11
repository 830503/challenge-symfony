<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * index
     *
     * @Rout("/learning", name="learning)
     */
    #[Route('/learning', name: 'learning')]    
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    
    /**
     * AboutMe
     *
     * @Rout("\aboutme", name="aboutme")
     */
    #[Route('/aboutme', name: 'aboutme')]    
    public function AboutMe(): Response {
        return $this->render('aboutme/index.html.twig', ['controller_name' => 'aboutme']);
    }
}
