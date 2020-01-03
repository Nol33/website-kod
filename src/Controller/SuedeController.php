<?php

// Représente l'architecture pour aller à la classe
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuedeController extends AbstractController
{

    /**
     * @Route("/suede", name="suede")
     */


    public function suede (/*PaysRepository $paysRepository*/)
    {

        return $this->render('suede.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la suede
    }
}