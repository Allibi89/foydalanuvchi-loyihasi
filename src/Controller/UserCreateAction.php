<?php

declare(strict_types=1);

namespace App\Controller;

use App\Component\User\UserFactory;
use App\Component\User\UserManager;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserCreateAction extends AbstractController
{
    public function __construct(private UserFactory $userFactory, private UserManager $userManager)
    {

    }
   public function __invoke(User $data): User
   {
     $user = $this->userFactory->create($data->getEmail(), $data->getPassword(), $data->getAge());
     $this->userManager->save($user, true);
      return $user;
   }
}