<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Criteria {
  function __construct(public Filters $filters, public Order $order) {
  }
}
