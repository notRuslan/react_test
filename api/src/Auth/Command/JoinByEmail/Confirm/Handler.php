<?php
declare(strict_types=1);

namespace App\Auth\Command\JoinByEmail\Confirm;


use App\Auth\Entity\User\UserRepository;
use DateTimeImmutable;
use DomainException;

class Handler
{
    /**
     * @var UserRepository
     */
    private UserRepository $users;
    /**
     * @var Flusher
     */
    private Flusher $flusher;

    public function __construct(UserRepository $users, Flusher $flusher)
    {
        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command) : void
    {
        if (!$user = $this->users->findByConfirmToken($command->token)){
            throw new DomainException('Incorect token');
        }

        $user->confirmJoin($command->token, new DateTimeImmutable());

        $this->flusher->flush();
    }
}