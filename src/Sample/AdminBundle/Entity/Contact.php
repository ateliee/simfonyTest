<?php

namespace Sample\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="contact")
*/
class Contact
{
    /**
    * @ORM\Id
    * @ORM\Column(type="bigint")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string", length=64, nullable=false)
    */
    protected $name;

    /**
    * @ORM\Column(type="string", length=255, nullable=false)
    */
    protected $mail;
    protected $mail_co;

    /**
    * @ORM\Column(type="integer", nullable=false)
     * @ORM\ManyToOne(targetEntity="Subjects", inversedBy="id")
     * @ORM\JoinColumn(name="subjects", referencedColumnName="id")
    */
    protected $subjects;

    /**
    * @ORM\Column(type="text", nullable=false)
    */
    protected $message;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    protected $file_path;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $date;

    /**
    * @ORM\Column(type="datetime", nullable=true)
    */
    protected $relay_date;

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
     * @return Contact
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
     * Set mail
     *
     * @param string $mail
     * @return Contact
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set mail_co
     *
     * @param string $mail
     * @return Contact
     */
    public function setMailCo($mail_co)
    {
        $this->mail_co = $mail_co;

        return $this;
    }

    /**
     * Get mail_co
     *
     * @return string
     */
    public function getMailCo()
    {
        return $this->mail_co;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Contact
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
     * Set file_path
     *
     * @param string $filePath
     * @return Contact
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;
    
        return $this;
    }

    /**
     * Get file_path
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Contact
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
     * Set relay_date
     *
     * @param \DateTime $relayDate
     * @return Contact
     */
    public function setRelayDate($relayDate)
    {
        $this->relay_date = $relayDate;
    
        return $this;
    }

    /**
     * Get relay_date
     *
     * @return \DateTime 
     */
    public function getRelayDate()
    {
        return $this->relay_date;
    }

    public function __construct()
    {
        $this->contact_details = new ArrayCollection();
    }

    /**
     * Set subjects
     *
     * @param integer $subjects
     * @return Contact
     */
    public function setSubjects($subjects)
    {
        $this->subjects = $subjects;
    
        return $this;
    }

    /**
     * Get subjects
     *
     * @return integer 
     */
    public function getSubjects()
    {
        return $this->subjects;
    }
}