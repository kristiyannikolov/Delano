<?php

namespace Delano\MainBundle\Controller;

use \DateTime;
use Delano\MainBundle\Entity\Reserve;
use Delano\MainBundle\Entity\ResVal;
use Delano\MainBundle\Form\ReserveType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class ReserveController
 * @package Delano\MainBundle\Controller
 */
class ReserveController extends Controller
{
    /**
     * @Route("/reservations", name="reserve")
     * @Method({"GET", "POST"})
     * @Template("DelanoMainBundle:Reserve:index.html.twig")
     */
	public function IndexAction(Request $getRequest)
	{
		$ip = $getRequest->getClientIp();
		$getime = new DateTime('now + 24hours');
		$ts = $getime->format('U');
        $reserve = new Reserve();
		$resval = new ResVal();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ReserveType(), $reserve, array('method' => 'POST'));
		$form->handleRequest($getRequest);
		if ($form->isValid()) {
			$resval->setExpireAt($ts);
			$resval->setIpaddr($ip);
            $reserve->setVer(0);
            $em->persist($reserve);
			$em->persist($resval);
            $em->flush();
            $this->get('session')
				->getFlashBag()
				->add(
                'reserve',
                'Your Reservation for '.
				$reserve->getName().' '.
				$reserve->getDate()->format('Y-m-d H:i:s')
				. ' has been submitted');

            return $this->redirect($this->generateUrl('reserve'));
        }

        return array(
            'csrf_token' => $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate'),
            'rq' => $form->createView(),
            'entity' => $reserve,
			'resval' => $resval,
        );
    }

    /**
     * @Route("/reservations/success", name="revsuccess")
	 * @Method({"GET"})
	 * @Template()
     */
    public function successAction()
    {
        return $this->render('DelanoMainBundle:Reserve:success.html.twig');
    }

    /**
     * @Route("/operate", name="operate")
	 * @Method({"GET"})
	 * @Template("DelanoMainBundle:Reserve:operate.html.twig")
     */
    public function operateAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
            throw new AccessDeniedException('You do not have permissions to access this page.');
        }
            $em = $this->getDoctrine()
                       ->getRepository('DelanoMainBundle:Reserve')
                       ->findAll();
		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$em,
			$this->get('request')->query->get('page', 1)
		);
        return array(
			'entity' => $em,
			'pagination' => $pagination
		);

    }

    /**
	 * @Route("/operate/verify/{getId}")
	 * @Method({"GET", "POST"})
	 */
	public function operatenAction($getId)
	{
        if (false === $this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
            throw new AccessDeniedException('You do not have permissions to access this page.');
        }
        $em = $this->getDoctrine()->getManager();
		$fid = $em->getRepository('DelanoMainBundle:Reserve')->find($getId);
		$fid->setVer(1);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
            'notice',
            'You just verified a reservation for ' . $fid->getName()
        );

        return $this->redirect($this->generateUrl('operate'));
    }
}
