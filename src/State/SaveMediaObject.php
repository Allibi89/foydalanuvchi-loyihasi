<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\MediaObject;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Vich\UploaderBundle\Storage\StorageInterface;
class SaveMediaObject implements ProcessorInterface
{
    public function __construct(
        #[Autowire('@api_platform.doctrine.orm.state.persist_processor')]
        private readonly ProcessorInterface $processor)
    {}

    public function process(mixed $data, Operation $operation, array $urivariables = [], array $context = [])
    {
        $uploadFile = $context['request']->files->get('file');
        if(!$uploadFile) {
            throw new BadRequestHttpException('"file" is required.');
        }
        $mediaObject = new MediaObject();
        $mediaObject->file = $uploadFile;
        return $this->processor->process($mediaObject,  $operation, $urivariables, $context);
    }
}