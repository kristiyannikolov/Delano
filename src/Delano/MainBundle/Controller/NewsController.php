<?php

namespace Delano\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class NewsController extends Controller
{
    /**
     * @Route("/news")
     * @Template()
	 * @Method({"GET"})
	 */
    public function indexAction()
    {
    }

}
