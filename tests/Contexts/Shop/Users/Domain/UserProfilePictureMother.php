<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use Faker\Factory;
use FasLatam\Contexts\Shop\Users\Domain\UserProfilePicture;

final class UserProfilePictureMother {
  static function create(?string $value = null): UserProfilePicture {
    return new UserProfilePicture($value ?? Factory::create()->imageUrl());
  }
}
