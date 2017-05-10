<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 10/05/2017
 * Time: 23:18
 */

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Repository\RefRepository;
use AppBundle\Repository\TagRepository;

class MainControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function testCanGetAllPublicRefs()
    {
        //Arrange

        //Act
        $refs = $this->em->getRepository('AppBundle:Ref')->findAllPublic();

        //Assert
        $this->assertNotNull($refs);
    }

    public function testCanGetAllPendingTags()
    {
        //Arrange

        //Act
        $tags = $this->em->getRepository('AppBundle:Tag')->findAllPending();

        //Assert
        $this->assertNotNull($tags);
    }
}