<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:39
 */

namespace App\Entity;

/**
 * Class Appointment
 * @package App\Entity
 */
class Appointment
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $dateStart;

    /**
     * @var
     */
    private $dateEnd;

    /**
     * @var
     */
    private $postpone;

    /**
     * @var
     */
    private $location;

    /**
     * @return int
     */
    public function getId(): int
    {
      return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDateStart(): \DateTime
    {
        return $this->dateStart;
    }

    /**
     * @param \DateTime $dateStart
     */
    public function setDateStart(\DateTime $dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd(): \DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime $dateEnd
     */
    public function setDateEnd(\DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return bool
     */
    public function getPostpone(): bool
    {
        return $this->postpone;
    }

    /**
     * @param bool $postpone
     */
    public function setPostpone(bool $postpone): void
    {
        $this->postpone = $postpone;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }
}
