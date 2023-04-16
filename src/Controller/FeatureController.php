<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeatureController extends AbstractController
{
    #[Route('/feature', name: 'feature',methods:['GET'])]
    public function index(): Response
    {
        return $this->render('Feature/index.html.twig', [
            'controller_name' => 'FeatureController',
        ]);
    }
}