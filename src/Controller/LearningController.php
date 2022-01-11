<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\Cloner\AbstractCloner;

class LearningController extends AbstractController
{
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/', name: 'homepage')]
    public function ShowMyName(): Response
    {
        // $name = 'Unknown';
        if (!empty($this->session->get('name'))) {
            $name = $this->session->get('name');
        } else {
            $name = "unknown";
        }
        return $this->render('homepage/index.html.twig', ['name' => $name]);
    }

    #[Route('/changeMyName', name: 'changeMyName', methods: ['POST'])]
    public function ChangeMyName(): RedirectResponse
    {
        if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $this->session->set('name', $name);
        } else {
            $name = "unknown";
        }
        return $this->redirectToRoute('homepage');
    }

    #[Route('/aboutme', name: 'aboutme')]
    public function AboutMe(): Response
    {
        // $name = "Unknown";
        if (!empty($this->session->get('name'))) {
            $name = $this->session->get('name');
            return $this->render('aboutme/index.html.twig', ['name' => $name]);
        } else {
            return $this->forward('App\Controller\LearningController::ShowMyName');
        }
    }
}
