<?php

namespace FasLatam\Contexts\Shop\Users\Domain;

final readonly class User {
  private function __construct(
    public UserId $id,
    public UserName $name,
    public UserEmail $email,
    public UserProfilePicture $profilePicture,
    public UserStatus $status
  ) {}

  static function create(
    string $id,
    string $name,
    string $email,
    string $profilePicture
  ): self {
    $defaultUserStatus = UserStatus::Active;

    return new self(
      new UserId($id),
      new UserName($name),
      new UserEmail($email),
      new UserProfilePicture($profilePicture),
      $defaultUserStatus
    );
  }

  static function fromPrimitives(UserPrimitives $primitives): self {
    return new self(
      new UserId($primitives->id),
      new UserName($primitives->name),
      new UserEmail($primitives->email),
      new UserProfilePicture($primitives->profilePicture),
      UserStatus::fromName($primitives->status)
    );
  }

  function toPrimitives(): UserPrimitives {
    return new UserPrimitives(
      $this->id->value,
      $this->name->value,
      $this->email->value,
      $this->profilePicture->value,
      $this->status->name
    );
  }
}
