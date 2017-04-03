<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bib;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bib controller.
 *
 * @Route("bib")
 */
class BibController extends Controller
{
    /**
     * Lists all bib entities.
     *
     * @Route("/", name="bib_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bibs = $em->getRepository('AppBundle:Bib')->findAll();

        return $this->render('bib/index.html.twig', array(
            'bibs' => $bibs,
        ));
    }

    /**
     * Creates a new bib entity.
     *
     * @Route("/new", name="bib_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bib = new Bib();
        $form = $this->createForm('AppBundle\Form\BibType', $bib);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bib);
            $em->flush($bib);

            return $this->redirectToRoute('bib_show', array('id' => $bib->getId()));
        }

        return $this->render('bib/new.html.twig', array(
            'bib' => $bib,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bib entity.
     *
     * @Route("/{id}", name="bib_show")
     * @Method("GET")
     */
    public function showAction(Bib $bib)
    {
        $deleteForm = $this->createDeleteForm($bib);

        return $this->render('bib/show.html.twig', array(
            'bib' => $bib,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bib entity.
     *
     * @Route("/{id}/edit", name="bib_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bib $bib)
    {
        $deleteForm = $this->createDeleteForm($bib);
        $editForm = $this->createForm('AppBundle\Form\BibType', $bib);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bib_edit', array('id' => $bib->getId()));
        }

        return $this->render('bib/edit.html.twig', array(
            'bib' => $bib,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bib entity.
     *
     * @Route("/{id}", name="bib_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bib $bib)
    {
        $form = $this->createDeleteForm($bib);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bib);
            $em->flush();
        }

        return $this->redirectToRoute('bib_index');
    }

    /**
     * Creates a form to delete a bib entity.
     *
     * @param Bib $bib The bib entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bib $bib)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bib_delete', array('id' => $bib->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
