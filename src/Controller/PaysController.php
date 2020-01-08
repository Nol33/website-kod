<?php

// Représente l'architecture pour aller à la classe
namespace App\Controller;

use App\Repository\PaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class PaysController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */


    public function home(/*PaysRepository $paysRepository*/)
    {
        // je viens chercher tous les pays de ma table pays (donc je fais une requete SQL SELECT) en utilisant la methode findAll()
        // de la classe paysRepository (qui a ete créée automatiquement par SF lors du make:entity)
        $pays = [] /*$paysRepository->findAll()*/;


        return $this->render('home.html.twig', [
            'pays' => $pays
        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient les pays
    }



    /**
     * @Route("/concept", name="concept")
     */
    public function concept()
    {
        return $this->render('concept.html.twig', [
        ]);
    }













}