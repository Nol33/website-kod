<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function danemarkCity(/*PaysRepository $paysRepository*/)
    {

        return $this->render('danemark_city.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark

    }





/**
* @Route("/danemark/city/result", name="danemark_city_result")
*/

    public function danemarkCityResult (Request $request /*PaysRepository $paysRepository*/)
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
     * @Route("/danemark/nature", name="danemark_nature")
     */

    public function danemarkNature (/*PaysRepository $paysRepository*/)
    {

        return $this->render('danemark_nature.html.twig', [

        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }








}
