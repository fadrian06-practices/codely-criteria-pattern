<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

use FasLatam\Contexts\Shared\Domain\EnumUtils;

enum Operator: string {
  case EQUAL = '=';
  case NOT_EQUAL = '!=';
  case GT = '>';
  case LT = '<';
  case CONTAINS = 'CONTAINS';
  case NOT_CONTAINS = 'NOT_CONTAINS';

  use EnumUtils;
}

final readonly class FilterOperator {
  function __construct(public Operator $value) {
  }
}
