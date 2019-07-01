<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:29
 */

namespace App\Repository\Interfaces;
use App\Entity\Application;

/**
 * Interface ApplicationRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface ApplicationRepositoryInterface
{
    /**
     * @param Application|null $application
     * @param string $message
     * @return Application|null
     */
    public function handleNotFoundException(?Application $application, string $message):? Application;

    /**
     * @return array
     */
    public function findAllApplications(): array;

    /**
     * @param int $id
     * @return Application|null
     */
    public function findApplicationWithId(int $id):? Application;
}