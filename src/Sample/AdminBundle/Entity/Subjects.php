<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="subjects")
*/
class Subjects
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

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
     * Set user
     *
     * @param integer $user
     * @return Subjects
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ContactDetails
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
}