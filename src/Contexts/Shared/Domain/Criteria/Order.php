<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Order {
  function __construct(public OrderBy $orderBy, public OrderType $orderType) {
  }

  static function none(): self {
    return new self(new OrderBy(''), new OrderType(OrderTypes::NONE));
  }
}
