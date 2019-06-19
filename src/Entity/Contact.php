<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:37
 */

namespace App\Entity;

/**
 * Class Contact
 * @package App\Entity
 */
class Contact
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
    private $email;

    /**
     * @var
     */
    private $source;

    /**
     * @var
     */
    private $mobilePhone;

    /**
     * @var
     */
    private $landLine;

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
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return null|string
     */
    public function getMobilePhone():? string
    {
        return $this->mobilePhone;
    }

    /**
     * @param null|string $mobilePhone
     */
    public function setMobilePhone(?string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return null|string
     */
    public function getLandLine():? string
    {
        return $this->landLine;
    }

    /**
     * @param null|string $landLine
     */
    public function setLandLine(?string $landLine): void
    {
        $this->landLine = $landLine;
    }
}
