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
     * @var
     */
    private $job;

    /**
     * @var
     */
    private $appointment;


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

    /**
     * @return Job
     */
    public function getJob(): Job
    {
        return $this->job;
    }

    /**
     * @param Job $job
     */
    public function setJob(Job $job)
    {
        $this->job = $job;
    }

    /**
     * @return Appointment|null
     */
    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    /**
     * @param Appointment $appointment
     */
    public function setAppointment(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }
}
