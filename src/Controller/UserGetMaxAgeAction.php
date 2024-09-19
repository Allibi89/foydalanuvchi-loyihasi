<?php

declare(strict_types=1);

namespace App\Controller;

use App\Component\User\MaxAgeDto;
use App\Repository\UserRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserGetMaxAgeAction extends AbstractController
{
    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function __invoke(UserRepository $userRepository): MaxAgeDto
    {
        return new MaxAgeDto($userRepository->findMaxAge());

    }
//    public function __invoke(UserRepository $userRepository)
//    {
//        return ($userRepository->findMaxAge());
//
//    }
}