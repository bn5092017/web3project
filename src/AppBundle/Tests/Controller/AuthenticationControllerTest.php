<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 09/05/2017
 * Time: 22:33
 */

namespace Tests\Controller;

use AppBundle\Controller\AuthenticationController;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class AuthenticationControllerTest extends \PHPUnit_Framework_TestCase
{
    /*private $passwordEncoder = new UserPasswordEncoder();
    public function testLoginAction()
    {
        //Arrange
        $username = 'tiff';
        $password = 'password2';

        //Act
        if($this->passwordEncoder->isPasswordValid($username, $password)){
            return true;
        }

        //Assert
        $this->assertNotNull($user);
    }*/
}