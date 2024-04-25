<?php

namespace FasLatam\Contexts\Shop\Users\Domain;

use FasLatam\Contexts\Shared\Domain\EnumUtils;

enum UserStatus: string {
  case Active = 'active';
  case Archived = 'archived';

  use EnumUtils;
}
