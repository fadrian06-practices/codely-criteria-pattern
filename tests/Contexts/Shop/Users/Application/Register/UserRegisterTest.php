<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Application\Register;

use FasLatam\Contexts\Shop\Users\Application\Register\UserRegister;
use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserRepository;
use FasLatam\Tests\Contexts\Shop\Users\Domain\UserMother;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class UserRegisterTest extends TestCase {
  private readonly UserRepository | MockObject $repository;
  private readonly UserRegister $userRegister;

  function setUp(): void {
    $this->repository = self::createMock(UserRepository::class);
    $this->userRegister = new UserRegister($this->repository);
  }

  #[Test]
  function register_a_valid_user(): void {
    $expectedUser = UserMother::create();
    $expectedUserPrimitives = $expectedUser->toPrimitives();

    $this->shouldSave($expectedUser);

    $this->userRegister->register(
      $expectedUserPrimitives->id,
      $expectedUserPrimitives->name,
      $expectedUserPrimitives->email,
      $expectedUserPrimitives->profilePicture
    );
  }

  function shouldSave(User $expectedUser): void {
    $this
      ->repository
      ->expects($this->once())
      ->method('save')
      ->with($expectedUser);
  }
}
