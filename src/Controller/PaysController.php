<?php

// Représente l'architecture pour aller à la classe
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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

        //j'utilise le productRepostory et la methode find() pour trouver un produit
        // en fonction de son id




        return $this->render('concept.html.twig', [

        ]);
    }
}