<?php
namespace Sample\AdminBundle\Entity;

//use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* Acme\UserBundle\Entity\User
*
* @ORM\Entity
* @ORM\Table(name="user")
*/
class User implements AdvancedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;

    /**
     * @ORM\Column(name="password", type="string", length=40)
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }
    public function isEnabled()
    {
        return $this->isActive;
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}