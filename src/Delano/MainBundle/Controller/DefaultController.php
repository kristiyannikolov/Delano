<?php

namespace Delano\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {

		// $em = getDoctrine()->getManager();
		// $news = new News();
		// $events = new Events();
		// $galley = new Gallery();
        return array('DelanoMainBundle:Default:index.html.twig');
    }

}
