<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 21:17
 */

namespace App\Repository\Interfaces;
use App\Entity\Company;

/**
 * Interface CompanyRepositoryInterface
 * @package App\Repository\Interfaces
 */
Interface CompanyRepositoryInterface
{
    /**
     * @param Company|null $company
     * @param string $message
     * @return Company|null
     */
    public function handleNotFoundException(?Company $company, string $message):? Company;

    /**
     * @return array
     */
    public function findAllCompanies(): array;

    /**
     * @param int $id
     * @return Company|null
     */
    public function findCompanyWithId(int $id):? Company;
}