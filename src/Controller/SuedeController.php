<?php

// Représente l'architecture pour aller à la classe
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/suede/city", name="suede_city")
     */

    public function suedeCity(/*PaysRepository $paysRepository*/)
    {

        return $this->render('suede_city.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la suède

    }





    /**
     * @Route("/suede/city/result", name="suede_city_result")
     */

    public function suedeCityResult (Request $request /*PaysRepository $paysRepository*/)
    {

        $result='';
        $prix_jour=325;
        $list_choix_jours=$request->request->get('list_choix_jours');
        $list_choix_pers=$request->request->get('list_choix_pers');

        if ($list_choix_jours == 3 && $list_choix_pers == 1){
            $result.=$list_choix_jours*$prix_jour;
        }

        if ($list_choix_jours == 3 && $list_choix_pers == 2){
            $result.=$list_choix_jours*$prix_jour;
        }




        return $this->render('panier.html.twig', [
            'result' => $result,
        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la suède
    }


    /**
     * @Route("/suede/nature", name="suede_nature")
     */

    public function suedeNature (/*PaysRepository $paysRepository*/)
    {

        return $this->render('norvege_nature.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }





}