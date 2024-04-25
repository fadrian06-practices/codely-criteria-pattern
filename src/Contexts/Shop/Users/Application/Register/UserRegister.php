<?php

namespace FasLatam\Contexts\Shop\Users\Application\Register;

use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserRepository;

final readonly class UserRegister {
  function __construct(private UserRepository $repository) {
  }

  function register(
    string $id,
    string $name,
    string $email,
    string $profilePicture
  ): void {
    $user = User::create($id, $name, $email, $profilePicture);

    $this->repository->save($user);
  }
}
