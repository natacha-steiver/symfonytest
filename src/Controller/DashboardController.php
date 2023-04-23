<?php

namespace App\Controller;

use App\Entity\Training;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ManagerRegistry $doctrine, PaginatorInterface $paginator,Request $request): Response
    {
        
        $repository= $doctrine->getRepository(Training::class);
        $trainings= $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        
        
       

        return $this->render('dashboard/index.html.twig', [
            'trainings' => $trainings,
        ]);
    }
}
