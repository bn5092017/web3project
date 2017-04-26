<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 26/04/2017
 * Time: 13:39
 */

namespace AppBundle\Controller;

use AppBundle\Form\UserLoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthenticationController extends Controller
{
    /**
     * @Route("/user/login", name="login")
     */
    public function loginAction()
    {
        $authUtils = $this->get('security.authentication_utils');

        $form = $this->createForm(UserLoginType::class);

        return $this->render('user/login.html.twig', [
            'loginForm' => $form->createView(),
        ]);
    }
}