<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class LearningController extends AbstractController
{
    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/aboutme', name: 'aboutme')]
    public function AboutMe(): Response
    {
        return $this->render('aboutme/index.html.twig', ['name' => 'About me']);
    }

    #[Route('/', name: 'homepage')]
    public function ShowMyName(): Response
    {
        if ($_POST) {
            $name = $_POST['name'];
        } else {
            $name = "Unknown";
        }
        return $this->render('homepage/index.html.twig', ['name' => $name]);
    }

    #[Route('/changeMyName', name: 'change')]
    public function ChangeMyName()
    {
        if (!empty($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
        }
        return $this->redirectToRoute(('homepage'));
    }
}
