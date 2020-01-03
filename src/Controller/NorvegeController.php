<?php
// Représente l'architecture pour aller à la classe

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NorvegeController extends AbstractController
{

    /**
     * @Route("/norvege", name="norvege")
     */


    public function norvege (/*PaysRepository $paysRepository*/)
    {

        return $this->render('norvege.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le norvege
    }
}