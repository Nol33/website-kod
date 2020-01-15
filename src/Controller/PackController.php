<?php

namespace App\Controller;

use App\Entity\Pack;
use App\Form\PackType;
use App\Repository\PackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pack")
 */
class PackController extends AbstractController
{
    /**
     * @Route("/", name="pack_index", methods={"GET"})
     */
    public function index(PackRepository $packRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('pack/index.html.twig', [
            'packs' => $packRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pack_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $pack = new Pack();
        $form = $this->createForm(PackType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pack);
            $entityManager->flush();

            return $this->redirectToRoute('pack_index');
        }

        return $this->render('pack/new.html.twig', [
            'pack' => $pack,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pack_show", methods={"GET"})
     */
    public function show(Pack $pack): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('pack/show.html.twig', [
            'pack' => $pack,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pack_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pack $pack): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(PackType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pack_index');
        }

        return $this->render('pack/edit.html.twig', [
            'pack' => $pack,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pack_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pack $pack): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete'.$pack->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pack);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pack_index');
    }

    /**
     * @Route("/danemark/city/result", name="danemark_city_result")
     */

    public function danemarkCityResult (Request $request,
                                        PackRepository $packRepository/*PaysRepository $paysRepository*/)
    {
        $packs = $packRepository->findAll();

        $result='';
        $prix_jour=325;
        $list_choix_jours=$request->request->get('list_choix_jours');
        $list_choix_pers=$request->request->get('list_choix_pers');




        if ($list_choix_jours == 3 && $list_choix_pers == 1){
            $result.=$list_choix_jours*$prix_jour;
            $titre = "danemark_city";
            $detail_jours=$packRepository->getByDuree($list_choix_jours, $titre);
        }

        if ($list_choix_jours == 3 && $list_choix_pers == 2){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }

        if ($list_choix_jours == 3 && $list_choix_pers == 3){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }
        if ($list_choix_jours == 3 && $list_choix_pers == 4){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }

        if ($list_choix_jours == 7 && $list_choix_pers == 1){
            $result.=$list_choix_jours*$prix_jour;
        }

        if ($list_choix_jours == 7 && $list_choix_pers == 2){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }

        if ($list_choix_jours == 7 && $list_choix_pers == 3){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }
        if ($list_choix_jours == 7 && $list_choix_pers == 4){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }

        if ($list_choix_jours == 10 && $list_choix_pers == 1){
            $result.=$list_choix_jours*$prix_jour;
        }

        if ($list_choix_jours == 10 && $list_choix_pers == 2){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }

        if ($list_choix_jours == 10 && $list_choix_pers == 3){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }
        if ($list_choix_jours == 10 && $list_choix_pers == 4){
            $result.=$list_choix_jours*$prix_jour*$list_choix_pers;
        }


        return $this->render('panier.html.twig', [
            'result' => $result,
            'detail_jours' =>$detail_jours,
            'packs' => $packs
        ]);
        // on retourne un fichier twig en lui envoyant la variable qui contient le danemark
    }




}
