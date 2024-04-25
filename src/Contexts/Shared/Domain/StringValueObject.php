<?php

namespace FasLatam\Contexts\Shared\Domain;

abstract readonly class StringValueObject {
  function __construct(public string $value) {
  }
}
