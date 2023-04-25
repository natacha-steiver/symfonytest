<?php
namespace App\Controller;

use App\Entity\Training;
use App\Form\Type\TrainingType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TrainingController extends AbstractController
{
    #[Route('/training', name: 'training',methods:['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository= $doctrine->getRepository(Training::class);
        $trainings= $repository->findAll();

        return $this->render('Training/index.html.twig', [
            'trainings' => $trainings,
        ]);
    }

    #[Route('/training/{id}', name: 'training-details',methods:['GET'])]
    public function show(ManagerRegistry $doctrine,Request $request): Response
    {
        $id = (int) ($request->get('id'));
        $repository= $doctrine->getRepository(Training::class);
        $training= $repository->find($id);
        return $this->render('Training/show.html.twig', [
            'training' => $training,
        ]);
    }
//*****************************Admin***********************************
    #[Route('/admin/training', name: 'training.all',methods:['GET'])]
    public function read(ManagerRegistry $doctrine): Response
    {
        $repository= $doctrine->getRepository(Training::class);
        $trainings= $repository->findAll();

        return $this->render('Training/index.html.twig', [
            'trainings' => $trainings,
        ]);
    }


    #[Route('/admin/training/add', name: 'training.new',methods:['GET','POST'])]
    public function add(ManagerRegistry $doctrine,Request $request): Response
    {

        
        $training= new Training();
        $form= $this->createForm(TrainingType::class,$training);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $training= $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($training);
            $entityManager->flush();
            return $this->redirectToRoute('app_dashboard');
        
        }

        return $this->render('Training/add.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    #[Route('/admin/training/{id}', name: 'training-update',methods:["GET","PUT", "PATCH"])]
    public function update(Training $training,ManagerRegistry $doctrine,Request $request,$id): Response
    {
  
        $id = (int) ($request->get('id'));
        $repository= $doctrine->getRepository(Training::class);
        $training= $repository->find($id);

        $form = $this->createForm(TrainingType::class, $training, [
            'action' => $this->generateUrl('training-update',['id'=>$id]),
            'method' => 'PUT',
        ]);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $training= $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($training);
            $entityManager->flush();
            return $this->redirectToRoute('app_dashboard');
        
        }

        return $this->render('Training/update.html.twig', [
            'form' => $form->createView(),
            'id' =>$id
        ]);

    }

    #[Route('/admin/training/delete/{id}', name: 'training-delete',methods:["GET","DELETE"])]
    public function delete(ManagerRegistry $doctrine,Request $request): Response
    {
        $id = (int) ($request->get('id'));
        $repository= $doctrine->getRepository(Training::class);
        $training= $repository->find($id);

    
            $entityManager = $doctrine->getManager();
            $entityManager->remove($training);
            $entityManager->flush();
        
        

            return $this->redirectToRoute('app_dashboard');
    }


}