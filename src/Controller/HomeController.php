<?php
namespace App\Controller;

use App\Entity\Training;
use App\Form\Type\TrainingType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Repository\TrainingRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home',methods:['GET'])]
    public function index( ManagerRegistry $doctrine,Request $request/*TrainingRepository $trainingRepository*/): Response
    {
        $orderBy=['dateCreation'=> 'DESC']; 
        $request->get('limit')?$limit= 6:$limit=3;
        $request->get('offset')?$offset= (int) ($request->get('offset')):$offset=1;
        $request->get('offset')?$buttonOffset="Less":$buttonOffset="More";
      //  $trainings = $trainingRepository->findLimit();
      $repository= $doctrine->getRepository(Training::class);
      $trainings= $repository->findBy([], $orderBy, $limit,$offset);
        return $this->render('Home/index.html.twig', [
            'controller_name' => 'HomeController',
            'trainings' => $trainings,
            "buttonOffset"=> $buttonOffset
        ]);
    }

    #[Route('/faq', name: 'faq',methods:['GET'])]
    public function indexFaq(): Response
    {
        return $this->render('FAQ/index.html.twig', [
            'controller_name' => 'HomeController'
          
        ]);
    }
}



