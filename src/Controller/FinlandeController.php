<?php
// Représente l'architecture pour aller à la classe
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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


    /**
     * @Route("/finlande/city", name="finlande_city")
     */

    public function finlandeCity(/*PaysRepository $paysRepository*/)
    {

        return $this->render('finlande_city.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la finlande

    }


    /**
     * @Route("/finlande/city/result", name="finlande_city_result")
     */

    public function finlandeCityResult (Request $request /*PaysRepository $paysRepository*/)
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
     * @Route("/finlande/nature", name="finlande_nature")
     */

    public function finlandeNature (/*PaysRepository $paysRepository*/)
    {

        return $this->render('finlande_nature.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient la finlande
    }







}