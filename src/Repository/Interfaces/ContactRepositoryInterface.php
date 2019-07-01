<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:29
 */

namespace App\Repository\Interfaces;
use App\Entity\Contact;

/**
 * Interface ApplicationRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface ContactRepositoryInterface
{
    /**
     * @param Contact|null $contact
     * @param string $message
     * @return Contact|null
     */
    public function handleNotFoundException(?Contact $contact, string $message):? Contact;

    /**
     * @return array
     */
    public function findAllContacts(): array;

    /**
     * @param int $id
     * @return Contact|null
     */
    public function findContactWithId(int $id):? Contact;
}