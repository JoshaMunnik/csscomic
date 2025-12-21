<?php

use App\Model\Entity\UserEntity;
use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 * @var UserEntity $user
 */

echo $this->contentElement(
  'email/registration',
  [
    'user' => $user,
  ]
);
