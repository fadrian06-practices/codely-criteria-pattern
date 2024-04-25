<?php

namespace FasLatam\Tests\Contexts\Shop\Users\Application\Search;

use FasLatam\Contexts\Shop\Users\Application\Search\UserSearcher;
use FasLatam\Contexts\Shop\Users\Domain\User;
use FasLatam\Contexts\Shop\Users\Domain\UserId;
use FasLatam\Contexts\Shop\Users\Domain\UserRepository;
use FasLatam\Tests\Contexts\Shop\Users\Domain\UserIdMother;
use FasLatam\Tests\Contexts\Shop\Users\Domain\UserMother;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class UserSearcherTest extends TestCase {
  private readonly UserRepository | MockObject $repository;
  private readonly UserSearcher $userSearcher;

  function setUp(): void {
    $this->repository = self::createMock(UserRepository::class);
    $this->userSearcher = new UserSearcher($this->repository);
  }

  #[Test]
  function return_null_searching_a_non_existing_user(): void {
    $userId = UserIdMother::create();

    $this->shouldNotSearch($userId);

    $this->assertNull($this->userSearcher->search($userId->value));
  }

  #[Test]
  function search_an_existing_user(): void {
    $existingUser = UserMother::create();

    $this->shouldSearch($existingUser);

    $this->assertEquals(
      $existingUser,
      $this->userSearcher->search($existingUser->id->value)
    );
  }

  function shouldSearch(User $user): void {
    $this
      ->repository
      ->expects($this->once())
      ->method('search')
      ->with($user->id)
      ->willReturn($user);
  }

  function shouldNotSearch(UserId $id): void {
    $this
      ->repository
      ->method('search')
      ->with($id)
      ->willReturn(null);
  }
}
