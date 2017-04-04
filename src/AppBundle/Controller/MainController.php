<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 04/04/2017
 * Time: 23:21
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('main/index.html.twig');
    }
}