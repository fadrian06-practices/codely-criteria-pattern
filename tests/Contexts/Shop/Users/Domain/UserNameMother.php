<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use Faker\Factory;
use FasLatam\Contexts\Shop\Users\Domain\UserName;

final class UserNameMother {
  static function create(?string $value = null): UserName {
    return new UserName($value ?? Factory::create()->firstName());
  }
}
