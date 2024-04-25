<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use Faker\Factory;
use FasLatam\Contexts\Shop\Users\Domain\UserEmail;

final class UserEmailMother {
  static function create(?string $value = null): UserEmail {
    return new UserEmail($value ?? Factory::create()->email());
  }
}
