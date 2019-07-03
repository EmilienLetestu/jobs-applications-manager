<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 03/07/2019
 * Time: 09:55
 */

namespace App\Entity;

/**
 * Class Mail
 * @package App\Entity
 */
class Mail
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $applicant;

    /**
     * @var
     */
    private $body;

    /**
     * @var
     */
    private $senderMail;

    /**
     * @var null
     */
    private $subject = null;

    /**
     * @var null
     */
    private $signature = null;

    /**
     * @var
     */
    private $createdOn;

    /**
     * @var null
     */
    private $updatedOn =  null;

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
    public function getApplicant(): string
    {
        return $this->applicant;
    }

    /**
     * @param string $applicant
     */
    public function setApplicant(string $applicant): void
    {
        $this->applicant = $applicant;
    }


    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return null|string
     */
    public function getSubject():? string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getSenderMail(): string
    {
        return $this->senderMail;
    }

    /**
     * @param string $senderMail
     */
    public function setSenderMail(string $senderMail): void
    {
        $this->senderMail = $senderMail;
    }

    /**
     * @return null|string
     */
    public function getSignature():? string
    {
        return $this->signature;
    }

    /**
     * @param null|string $signature
     */
    public function setSignature(?string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTime $createdOn
     */
    public function setCreatedOn(\DateTime $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedOn():? \DateTime
    {
        return $this->updatedOn;
    }

    /**
     * @param \DateTime|null $updatedOn
     */
    public function setUpdatedOn(?\DateTime $updatedOn): void
    {
        $this->updatedOn = $updatedOn;
    }
}
