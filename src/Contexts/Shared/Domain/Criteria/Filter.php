<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Filter {
  function __construct(
    public FilterField $field,
    public FilterOperator $operator,
    public FilterValue $value
  ) {
  }
}
