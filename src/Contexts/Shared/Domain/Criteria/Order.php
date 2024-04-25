<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Order {
  function __construct(public OrderBy $orderBy, public OrderType $orderType) {
  }

  static function none(): self {
    return new self(new OrderBy(''), new OrderType(OrderTypes::NONE));
  }

  static function fromPrimitives(?string $orderBy, ?string $orderType): self {
    return !$orderBy ? Order::none() : new Order(
      new OrderBy($orderBy),
      new OrderType(OrderTypes::fromName($orderType))
    );
  }
}
