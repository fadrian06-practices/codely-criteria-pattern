<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use DateInterval;
use DateTimeImmutable;
use Faker\Factory;

final class DateMother {
  static function create(?string $value = null): DateTimeImmutable {
    return new DateTimeImmutable($value ?? Factory::create()->dateTime());
  }

  static function today(): DateTimeImmutable {
    return new DateTimeImmutable;
  }

  static function yesterday(): DateTimeImmutable {
    $today = new DateTimeImmutable;

    return $today->sub(new DateInterval('P1D'));
  }
}
