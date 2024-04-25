<?php

namespace FasLatam\Contexts\Shop\Users\Application\Search;

use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserId;
use FasLatam\Contexts\Shop\Users\Domain\UserRepository;

final readonly class UserSearcher {
  function __construct(private UserRepository $repository) {
  }

  function search(string $id): ?User {
    return $this->repository->search(new UserId($id));
  }
}
