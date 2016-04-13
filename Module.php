<?php

namespace TccSkippableSegment;

use TccSkippableSegment\Mvc\Router\Http\SkippableSegment;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\Router\RouteInvokableFactory;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function getConfig()
    {
        return [
            'route_manager' => [
                'invokables' => [],
                'aliases' => [
                    'SkippableSegment' => SkippableSegment::class,
                ],
                'factories' => [
                    SkippableSegment::class => RouteInvokableFactory::class,
                ]
            ],
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php',
            ],
        ];
    }
}
