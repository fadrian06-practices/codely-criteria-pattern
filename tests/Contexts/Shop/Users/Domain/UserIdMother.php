<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use Faker\Factory;
use FasLatam\Contexts\Shop\Users\Domain\UserId;

final class UserIdMother {
  static function create(?string $value = null): UserId {
    return new UserId($value ?? Factory::create()->uuid());
  }
}
