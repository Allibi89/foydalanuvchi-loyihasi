<?php

declare(strict_types=1);

namespace App\Component\User;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

class MaxAgeDto
{
    public function __construct(
        #[Groups(['user:read'])]
        private int $maxAge
    )
    {

    }

    public function getMaxAge(): int
    {
        return $this->maxAge;
    }
    public function getAge(): int
    {
        return $this->maxAge;
    }





//    public function getAge(SerializerInterface $serializer): JsonResponse
//    {
//
//        $maxAgeDto = $this->maxAge;
//
//        return new JsonResponse($serializer->serialize($maxAgeDto, 'json', ['groups' => ['user:read']]), 200, [], true);
//    }

}