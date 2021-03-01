<?php


namespace App\Auth\Command\JoinByEmail\Request;


use DateTimeImmutable;
use DomainException;
use Ramsey\Uuid\Uuid;
use function mb_strtolower;
use function password_hash;
use const PASSWORD_ARGON2I;

class Handler
{
    /**
     * @var UserRepository
     */
    private UserRepository $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    public function handler(Command $command): void
    {
        $email = mb_strtolower($command->email);

        if ($this->users->hasByEmail($email)){
            throw new DomainException('User already exists');
        }

        $user = new User(
            Uuid::uuid4()->toString(),
            new DateTimeImmutable(),
            $email,
            password_hash($command->password, PASSWORD_ARGON2I),
            Uuid::uuid4()->toString()
        );

        $this->users->add($user);
    }
}


class User
{
//    private ?int $id; // Id autoincrement in DB
    private int $id;
    private DateTimeImmutable $date;
    private string $email;
    private string $hash;
    private string $token;

    public function __construct(int $id, DateTimeImmutable $date , string $email, string $hash, string $token)
    {
        $this->id = $id;
        $this->$date = $date;
        $this->email = $email;
        $this->hash = $hash;
        $this->token = $token;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}