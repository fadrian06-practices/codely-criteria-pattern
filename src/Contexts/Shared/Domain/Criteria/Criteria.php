<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Criteria {
  function __construct(public Filters $filters, public Order $order) {
  }

  static function fromPrimitives(
    ?string $orderBy,
    ?string $orderType,
    FilterPrimitives ...$filters
  ): self {
    return new self(
      Filters::fromPrimitives(...$filters),
      Order::fromPrimitives($orderBy, $orderType)
    );
  }
}
