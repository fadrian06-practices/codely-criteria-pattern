<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Filters {
  /** @var Filter[] */
  public array $filters;

  function __construct(Filter ...$filters) {
    $this->filters = $filters;
  }

  static function fromPrimitives(FilterPrimitives ...$filters): self {
    return new self(...array_map(
      fn (FilterPrimitives $filter): Filter => Filter::fromPrimitives(
        $filter->field,
        $filter->operator,
        $filter->value
      ),
      $filters
    ));
  }
}
