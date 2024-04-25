<?php

namespace FasLatam\Contexts\Shop\Users\Domain;

final readonly class UserPrimitives {
  function __construct(
    public string $id,
    public string $name,
    public string $email,
    public string $profilePicture,
    public string $status
  ) {
  }
}
