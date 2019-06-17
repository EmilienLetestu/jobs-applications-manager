<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:37
 */

namespace App\Entity;

/**
 * Class Job
 * @package App\Entity
 */
class Job
{
    /**
     * @var
     */
    private $id;

    /**
     * @var null
     */
    private $description = null;

    /**
     * @var
     */
    private $position;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getDescription():? string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}
