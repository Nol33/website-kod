<?php
// Représente l'architecture pour aller à la classe
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FinlandeController extends AbstractController
{

    /**
     * @Route("/finlande", name="finlande")
     */


    public function finlande (/*PaysRepository $paysRepository*/)
    {

        return $this->render('finlande.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la finlande
    }
}