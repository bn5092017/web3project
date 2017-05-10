<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 07/04/2017
 * Time: 21:31
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Ref;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class RefBasketController
 *
 * @Route("/basket")
 */
class RefBasketController extends Controller
{
    /**
     * @Route("/", name="ref_basket_index")
     */
    public function indexAction()
    {
        return $this->render('basket/index.html.twig');
    }

    /**
     * @Route("/add/{id}", name="ref_basket_add")
     */
    public function addToBasket(Ref $ref)
    {
        $bib = [];

        $session = new Session();
        if($session->has('basket')){
            $bib = $session->get('basket');
        }

        $id = $ref->getId();

        if(!array_key_exists($id, $bib)){

            $bib[$id] = $ref;

            $session->set('basket', $bib);
        }

        return $this->redirectToRoute('ref_basket_index');
    }
    /**
     * @Route("/clear", name="ref_basket_clear")
     */
    public function clearAction()
    {
        $session = new Session();
        $session->remove('basket');

        return $this->redirectToRoute('ref_basket_index');
    }


    /**
     * @Route("/delete/{id}", name="ref_basket_delete")
     */
    public function deleteAction($id)
    {
        $ref = [];

        $session = new Session();
        if($session->has('basket')){
            $ref = $session->get('basket');
        }

        if(array_key_exists($id, $ref)){

            unset($ref[$id]);

            if(sizeof($ref) < 1){
                return $this->redirectToRoute('ref_basket_clear');
            }

            $session->set('basket', $ref);
        }

        return $this->redirectToRoute('ref_basket_index');
    }
}