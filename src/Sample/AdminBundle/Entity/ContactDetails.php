<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Table(name="contact_details")
*/
class ContactDetails
{
    /**
     * @var integer
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
}