<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:38
 */

namespace App\Entity;

/**
 * Class Application
 * @package App\Entity
 */
class Application
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $appliedOn;

    /**
     * @var
     */
    private $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime|null
     */
    public function getAppliedOn():? \DateTime
    {
        return $this->appliedOn;
    }

    /**
     * @param \DateTime $appliedOn
     */
    public function setAppliedOn(\DateTime $appliedOn): void
    {
        $this->appliedOn = $appliedOn;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
