<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PriceController extends AbstractController
{
    #[Route('/price', name: 'price',methods:['GET'])]
    public function index(): Response
    {
        return $this->render('Price/index.html.twig', [
            'controller_name' => 'PriceController',
        ]);
    }
}