<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Domain;

use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserPrimitives;
use FasLatam\Contexts\Shop\Users\Domain\UserStatus;

final class UserMother {
  /** @param ?UserPrimitives $params */
  static function create(?object $params = null): User {
    $primitives = new UserPrimitives(
      UserIdMother::create($params?->id)->value,
      UserNameMother::create($params?->name)->value,
      UserEmailMother::create($params?->email)->value,
      UserProfilePictureMother::create($params?->profilePicture)->value,
      UserStatus::Active->name
    );

    return User::fromPrimitives($primitives);
  }
}
