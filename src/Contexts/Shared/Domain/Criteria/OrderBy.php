<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class OrderBy {
  function __construct(public string $value) {
  }
}
