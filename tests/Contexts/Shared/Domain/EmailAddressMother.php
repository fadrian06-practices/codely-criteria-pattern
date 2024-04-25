<?php

namespace FasLatam\Tests\Contexts\Shared\Domain;

use Faker\Factory;
use FasLatam\Contexts\Shared\Domain\EmailAddress;

class EmailAddressMother {
  static function create(?string $value = null) {
    return new EmailAddress($value ?? Factory::create()->email());
  }
}
