<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:37
 */

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Company
 * @package App\Entity
 */
class Company
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $type;

    /**
     * @var ArrayCollection
     */
    private $contacts;

    /**
     * @var ArrayCollection
     */
    private $applications;

    /**
     * Contact constructor.
     */
    public function __construct()
    {
        $this->contacts     = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return ArrayCollection
     */
    public function getContacts(): ArrayCollection
    {
        return $this->contacts;
    }

    /**
     * @param Contact $contact
     */
    public function addContact(Contact $contact)
    {
        $this->contacts[] = $contact;
    }

    /**
     * @param Contact $contact
     */
    public function removeContact(Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * @return ArrayCollection
     */
    public function getApplications(): ArrayCollection
    {
        return $this->contacts;
    }

    /**
     * @param Application $application
     */
    public function addApplication(Application $application)
    {
        $this->applications[] = $application;
    }

    /**
     * @param Application $application
     */
    public function removeApplication(Application $application)
    {
        $this->applications->removeElement($application);
    }
}
