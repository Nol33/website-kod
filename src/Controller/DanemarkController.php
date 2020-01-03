<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DanemarkController extends AbstractController
{

    /**
     * @Route("/danemark", name="danemark")
     */

    public function danemark (/*PaysRepository $paysRepository*/)
    {

        return $this->render('danemark.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark

    }

/**
* @Route("/danemark/city", name="danemark_city")
*/

    public function danemarkCity (/*PaysRepository $paysRepository*/)
    {

        return $this->render('danemark_city.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }


    /**
     * @Route("/danemark/nature", name="danemark_nature")
     */

    public function danemarkNature (/*PaysRepository $paysRepository*/)
    {

        return $this->render('danemark_nature.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }








}
