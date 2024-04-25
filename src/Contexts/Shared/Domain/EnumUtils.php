<?php

namespace FasLatam\Contexts\Shared\Domain;

use Exception;
use UnitEnum;

trait EnumUtils {
  static function fromName(string $name): UnitEnum {
    return array_filter(
      self::cases(),
      fn (UnitEnum $case): bool => $case->name === $name
    )[0] ?? throw new Exception("Case $name does not exists on " . static::class);
  }
}
