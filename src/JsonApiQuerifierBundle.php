<?php

namespace Paknahad\JsonApiQuerifierBundle;

use Paknahad\JsonApiQuerifierBundle\DependencyInjection\JsonApiQuerifierExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonApiQuerifierBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new JsonApiQuerifierExtension();
    }
}
