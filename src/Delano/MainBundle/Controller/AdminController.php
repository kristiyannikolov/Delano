<?php

namespace Delano\MainBundle\Controller;

use Delano\MainBundle\Entity\News;
use Delano\MainBundle\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class AdminController extends Controller
{
    /**
     * @Route("/")
	 * @Method({"GET"})
	 * @Template("DelanoMainBundle:Admin:index.html.twig")
     */
    public function indexAction()
    {

    }

    /**
     * @Route("/news")
	 * @Method({"GET", "POST"})
	 * @Template("DelanoMainBundle:Admin:editnews.html.twig")
     */
    public function editnewsAction(Request $request)
    {
        $time = new \DateTime();
        $time->getTimestamp();
        $entity = new News();
        $entity->setDate($time);
        $entity->setAuthor('Admin');
        $form = $this->createForm(new NewsType(), $entity);
        $form->handleRequest($request);
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Your post has<strong>' . $entity->getTitle() . '</strong>been submitted');
        }

        return $this->render('DelanoMainBundle:Admin:editnews.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'csrf_token' => $this->container->get('form.csrf_provider')->generateCsrfToken('sedimalko')
        ));


    }

    /**
     * @Route("/messages")
	 * @Method({"GET", "POST"})
	 * @Template()
     */
    public function sendmsgAction()
    {
    }

    /**
     * @Route("/reservations")
	 * @Method({"GET", "POST"})
	 * @Template()
     */
    public function showresAction()
    {
    }

    /**
     * @Route("/events")
	 * @Method({"GET"})
	 * @Template()
     */
    public function eventsAction()
    {
    }

    /**
     * @Route("/users")
	 * @Method({"GET"})
	 * @Template()
     */
    public function usersAction()
    {
    }

}
