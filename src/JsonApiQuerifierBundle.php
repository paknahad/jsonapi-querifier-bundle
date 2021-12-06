<?php

namespace Paknahad\JsonApiQuerifierBundle;

use Paknahad\JsonApiQuerifierBundle\DependencyInjection\JsonApiQuerifierExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonApiQuerifierBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new JsonApiQuerifierExtension();
    }
}
