<?php

use App\Model\Entity\UserEntity;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserEntity $user
 * @var string $token
 */

echo $this->contentElement(
  'email/reset_password',
  [
    'user' => $user,
    'token' => $token,
  ]
);
