<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Table(name="users")
*/
class Users
{
    /**
    * @var integer
    * @ORM\Column(type="bigint")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @ORM\Column(type="string", length=32, nullable=false)
    */
    private $login_id;

    /**
    * @ORM\Column(type="string", length=255, nullable=false)
    */
    private $login_password;

    /**
    * @ORM\Column(type="string", length=255, nullable=false)
    */
    private $salt;

    /**
    * @ORM\Column(type="string", length=64, nullable=false)
    */
    private $name;

    /**
    * @ORM\Column(type="datetime", nullable=false)
    */
    private $create;

    /**
    * @ORM\Column(type="datetime", nullable=false)
    */
    private $update;

}