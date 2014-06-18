<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="contact_details")
*/
class ContactDetails
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="contact_details")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     */
    private $message;

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
     * Set message
     *
     * @param string $message
     * @return ContactDetails
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return ContactDetails
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
}