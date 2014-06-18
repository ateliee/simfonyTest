<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="users")
*/
class Users
{
    /**
    * @ORM\Id
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
     * Set login_id
     *
     * @param string $loginId
     * @return Users
     */
    public function setLoginId($loginId)
    {
        $this->login_id = $loginId;
    
        return $this;
    }

    /**
     * Get login_id
     *
     * @return string 
     */
    public function getLoginId()
    {
        return $this->login_id;
    }

    /**
     * Set login_password
     *
     * @param string $loginPassword
     * @return Users
     */
    public function setLoginPassword($loginPassword)
    {
        $this->login_password = $loginPassword;
    
        return $this;
    }

    /**
     * Get login_password
     *
     * @return string 
     */
    public function getLoginPassword()
    {
        return $this->login_password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Users
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Users
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
     * Set create
     *
     * @param \DateTime $create
     * @return Users
     */
    public function setCreate($create)
    {
        $this->create = $create;
    
        return $this;
    }

    /**
     * Get create
     *
     * @return \DateTime 
     */
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * Set update
     *
     * @param \DateTime $update
     * @return Users
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    
        return $this;
    }

    /**
     * Get update
     *
     * @return \DateTime 
     */
    public function getUpdate()
    {
        return $this->update;
    }
}