<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooAction extends AbstractController
{
    public function __invoke(BookRepository $bookRepository)
    {
        $book = $bookRepository->find(3);
// id’si 3ga teng bo’lgan kitobni topishni buyurdik. javob sifatida Book
// sinfiga tegishli obyekt qaytaradi. Agar, bu id’li kitob bo’lmasa, null
// qaytaradi.

        $books = $bookRepository->findOneBy(['name' => 'An American Tragedy']);
// Ma’lumotni shartlar bo’yicha qidirish kerakligini buyurdik.
// SQL tilida bu: WHERE name = ‘An American Tragedy’ LIMIT 1

        $books = $bookRepository->findBy(['name' => 'An American Tragedy']);
// Ma’lumotlarni shartlar bo’yicha qidirish.
// SQL tilida  bu: WHERE name = ‘An American Tragedy’
// Jacob sifatida ko’plik qaytariladi. Har bir ko’plik elementi Book sinfi
// obyektiga teng bo’ladi.
    }
}