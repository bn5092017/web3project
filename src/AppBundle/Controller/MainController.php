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
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * Lists all public ref entities.
     *
     * @Route("/public/ref", name="ref_list_public")
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

    /**
     * Lists all public tag entities.
     *
     * @Route("/public/tag", name="tag_list_public")
     * @Method("GET")
     */
    public function listPublicTags()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AppBundle:Tag')->findAllPublic();

        return $this->render('public/publicTag.html.twig', array(
            'tags' => $tags,
        ));
    }

    /**
     * Lists all pending tag entities.
     *
     * @Route("/public/pending", name="tag_list_pending")
     * @Method("GET")
     */
    public function listPendingTags()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AppBundle:Tag')->findAllPending();

        return $this->render('public/publicTag.html.twig', array(
            'tags' => $tags,
        ));
    }
}