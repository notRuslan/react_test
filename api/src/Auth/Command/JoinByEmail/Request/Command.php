<?php

namespace App\Auth\Command\JoinByEmail\Request;

use Symfony\Component\Validator\Constraints as Assert;

/** Class like DTO
 * Class Command
 * @package App\Auth\Command\JoinByEmail\Request
 */

class Command
{
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public string $email = '';
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=6, allowEmptyString=true)
     */
    public string $password = '';
}
