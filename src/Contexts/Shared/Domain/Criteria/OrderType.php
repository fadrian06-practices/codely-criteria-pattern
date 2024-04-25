<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

use FasLatam\Contexts\Shared\Domain\EnumUtils;

enum OrderTypes: string {
  case ASC = 'asc';
  case DESC = 'desc';
  case NONE = 'none';

  use EnumUtils;
}

final readonly class OrderType {
  function __construct(public OrderTypes $value) {
  }
}
