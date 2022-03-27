<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GiteRepository;

class GiteController extends AbstractController
{
    #[Route('/gite', name: 'app_gite')]
    public function index(GiteRepository $ripo)
    {
        $gites = $ripo->findAll();

        return $this->render('gite/index.html.twig', [
            'gites' => $gites
        ]);
    }
}
