<?php

namespace Delano\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResVal
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ResVal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddr", type="string", length=20)
     */
    private $ipaddr;

    /**
     * @var integer
     *
     * @ORM\Column(name="expireAt", type="integer")
     */
    private $expireAt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ipaddr
     *
     * @param string $ipaddr
     * @return ResVal
     */
    public function setIpaddr($ipaddr)
    {
        $this->ipaddr = $ipaddr;

        return $this;
    }

    /**
     * Get ipaddr
     *
     * @return string 
     */
    public function getIpaddr()
    {
        return $this->ipaddr;
    }

    /**
     * Set expireAt
     *
     * @param integer $expireAt
     * @return ResVal
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * Get expireAt
     *
     * @return integer 
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }
}
