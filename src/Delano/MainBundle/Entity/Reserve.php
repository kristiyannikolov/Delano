<?php

namespace Delano\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserve
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reserve
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ver", type="boolean")
     */
    private $ver;

    /**
     * @var integer
     *
     * @ORM\Column(name="many", type="integer")
     */
    private $many;

    /**
     * @var string
     *
     * @ORM\Column(name="extra", type="text")
     */
    private $extra;


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
     * Set name
     *
     * @param string $name
     * @return Reserve
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Reserve
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set ver
     *
     * @param boolean $ver
     * @return Reserve
     */
    public function setVer($ver)
    {
        $this->ver = $ver;

        return $this;
    }

    /**
     * Get ver
     *
     * @return boolean 
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * Set many
     *
     * @param integer $many
     * @return Reserve
     */
    public function setMany($many)
    {
        $this->many = $many;

        return $this;
    }

    /**
     * Get many
     *
     * @return integer 
     */
    public function getMany()
    {
        return $this->many;
    }

    /**
     * Set extra
     *
     * @param string $extra
     * @return Reserve
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string 
     */
    public function getExtra()
    {
        return $this->extra;
    }
}
