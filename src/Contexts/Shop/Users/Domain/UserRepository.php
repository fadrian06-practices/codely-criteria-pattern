<?php

namespace FasLatam\Contexts\Shop\Users\Domain;

use FasLatam\Contexts\Shared\Domain\Criteria\Criteria;

interface UserRepository {
  function save(User $user): void;
  function search(UserId $id): ?User;

  /** @return User[] */
  function matching(Criteria $criteria): array;
}
