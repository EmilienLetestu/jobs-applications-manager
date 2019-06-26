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
    private $email = null;

    /**
     * @var
     */
    private $source = null;

    /**
     * @var
     */
    private $mobilePhone = null;

    /**
     * @var
     */
    private $landLine = null;

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
     * @return null|string
     */
    public function getEmail():? string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param null|string $source
     */
    public function setSource(?string $source): void
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
