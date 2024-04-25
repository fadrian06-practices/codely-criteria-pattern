<?php

namespace FasLatam\Contexts\Shop\Users\Application\SearchByCriteria;

use FasLatam\Contexts\Shared\Domain\Criteria\Criteria;
use FasLatam\Contexts\Shared\Domain\Criteria\FilterPrimitives;
use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserRepository;

final readonly class UsersByCriteriaSearcher {
  function __construct(private UserRepository $repository) {
  }

  /** @return User[] */
  function search(
    ?string $orderBy,
    ?string $orderType,
    FilterPrimitives ...$filters
  ): array {
    $criteria = Criteria::fromPrimitives($orderBy, $orderType, ...$filters);

    return $this->repository->matching($criteria);
  }
}
