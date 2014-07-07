<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace Delano\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    /**
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
		$menu->addChild('News', array('route' => 'homepage'));
		$menu->addChild('Events', array('route' => 'homepage'));
        $menu->addChild('For Reservations', array('route' => 'reserve'));
        $menu->addChild('Gallery', array('route' => 'homepage'));
        $menu->addChild('Friends', array('route' => 'homepage'));
		$menu->addChild('About', array('route' => 'homepage'));
		$menu->addChild('Contacts', array('route' => 'homepage'));
        return $menu;
    }
}