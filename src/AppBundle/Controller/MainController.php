<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 04/04/2017
 * Time: 23:21
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * Lists all public ref entities.
     *
     * @Route("ref/public", name="ref_list_public")
     * @Method("GET")
     */
    public function listPublicRefs()
    {
        $em = $this->getDoctrine()->getManager();

        $refs = $em->getRepository('AppBundle:Ref')->findAllPublic();

        return $this->render('public/publicRef.html.twig', array(
            'refs' => $refs,
        ));
    }

}