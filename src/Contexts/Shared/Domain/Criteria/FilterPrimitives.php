<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class FilterPrimitives {
  function __construct(
    public string $field,
    public string $operator,
    public string $value
  ) {
  }
}
