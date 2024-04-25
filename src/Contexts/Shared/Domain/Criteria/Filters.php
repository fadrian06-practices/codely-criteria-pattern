<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Filters {
  /** @var Filter[] */
  public array $filters;

  function __construct(Filter ...$filters) {
    $this->filters = $filters;
  }
}
