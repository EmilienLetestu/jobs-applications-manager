<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:50
 */

namespace App\DTO;

use App\Entity\Application;

/**
 * Class AppointmentDTO
 * @package App\DTO
 */
class AppointmentDTO
{
    /**
     * @var \DateTime
     */
    public $dateStart;

    /**
     * @var \DateTime
     */
    public $startTime;

    /**
     * @var string
     */
    public $duration;

    /**
     * @var string
     */
    public $location;

    /**
     * @var float
     */
    public $lng;

    /**
     * @var float
     */
    public $lat;

    /**
     * @var Application
     */
    public $application;

    /**
     * AppointmentDTO constructor.
     * @param \DateTime $dateStart
     * @param \DateTime $startTime
     * @param string $duration
     * @param string $location
     * @param float $lng
     * @param float $lat
     * @param Application $application
     */
    public function __construct(
        \DateTime   $dateStart,
        \DateTime   $startTime,
        string      $duration,
        string      $location,
        float       $lng,
        float       $lat,
        Application $application
    )
    {
        $this->dateStart = $dateStart;
        $this->startTime = $startTime;
        $this->duration  = $duration;
        $this->location  = $location;
        $this->lng       = $lng;
        $this->lat       = $lat;
    }
}
