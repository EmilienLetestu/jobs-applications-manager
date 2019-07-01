<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:09
 */

namespace App\Repository\Interfaces;
use App\Entity\Job;

/**
 * Interface JobRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface JobRepositoryInterface
{
    /**
     * @param Job|null $job
     * @param string $message
     * @return Job|null
     */
    public function handleNotFoundException(?Job $job, string $message):? Job;

    /**
     * @return array
     */
    public function findAllJobs(): array;

    /**
     * @param int $id
     * @return Job|null
     */
    public function findJobWithId(int $id):? Job;
}