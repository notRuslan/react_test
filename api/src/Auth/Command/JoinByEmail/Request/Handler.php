<?php


namespace App\Auth\Command\JoinByEmail\Request;


use function mb_strtolower;
use function password_hash;
use const PASSWORD_ARGON2I;

class Handler
{
    public function handler(Command $command): void
    {
        $user = new User(
            mb_strtolower($command->email),
            password_hash($command->password, PASSWORD_ARGON2I)

        );
    }
}


class User
{
    private ?int $id; // Id autoincrement in DB
    private string $email;
    private string $hash;

    public function __construct(string $email, string $hash)
    {
        $this->email = $email;
        $this->hash = $hash;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}