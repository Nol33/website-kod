<?php
// Représente l'architecture pour aller à la classe

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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



    /**
     * @Route("/norvege/city", name="norvege_city")
     */

    public function norvegeCity(/*PaysRepository $paysRepository*/)
    {

        return $this->render('norvege_city.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark

    }





    /**
     * @Route("/norvege/city/result", name="norvege_city_result")
     */

    public function norvegeCityResult (Request $request /*PaysRepository $paysRepository*/)
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
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }


    /**
     * @Route("/norvege/nature", name="norvege_nature")
     */

    public function norvegeNature (/*PaysRepository $paysRepository*/)
    {

        return $this->render('norvege_nature.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }





}